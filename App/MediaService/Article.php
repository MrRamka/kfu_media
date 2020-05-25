<?php


namespace App\MediaService;


use App\App;
use App\Model\Setting;
use App\Model\UploadedImage;
use DiDom\Document;

/**
 * Class Article
 * @package App\MediaService
 */
class Article
{
    public $title;
    public $text;
    public $link;
    public $date;
    public $author;
    public $category;
    public $label;

    public function filterText($parser): void
    {
        $domain = parse_url($parser->link);

        $document = new Document($this->text);
        $links = $document->find('a');
        foreach ($links as $link) {
            $href = $link->attr('href');
            $href = parse_url($href);
            if (!isset($href['host']) && !isset($href['scheme'])) {
                $href['scheme'] = $domain['scheme'];
                $href['host'] = $domain['host'];
                $link->attr('href', App::$app->providerService()->buildUrl($href));
            }
        }
        $images = $document->find('img');
        foreach ($images as $image) {
            $src = $image->attr('src');
            $src = parse_url($src);
            if (!isset($src['host'])) {
                $src['scheme'] = $domain['scheme'];
                $src['host'] = $domain['host'];

                $sourceImage = App::$app->providerService()->buildUrl($src);

                $uploadedImage = UploadedImage::one(['source' => $sourceImage]);
                if (isset($uploadedImage['link']) && $uploadedImage['link']) {

                    $image->attr('src', $uploadedImage['link']);
                } else {
                    $uploadedImage = App::$app->providerService()->get(Setting::getSetting('main_domain') . '/?mediaparser_path=post/upload&url=' . $sourceImage.'&token='.Setting::getSetting('token'));

                    if ($uploadedImage) {
                        UploadedImage::insert(['source' => $sourceImage, 'link' => $uploadedImage]);
                        $image->attr('src', $uploadedImage);
                    } else {
                        $image->attr('src', $sourceImage);
                    }
                }
            }
        }
        $this->text = $document->html();
        $this->text = str_replace(['<html>', '</html>', '<body>', '</body>'], ['', '', '', ''], $this->text);
    }
}