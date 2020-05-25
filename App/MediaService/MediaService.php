<?php


namespace App\MediaService;


use App\Abstracts\AbstractArticleParser;
use App\App;
use App\Model\Setting;
use App\Model\Upload;
use MongoDB\Driver\Exception\Exception;

/**
 * Class MediaService
 * Provides methods to manage articles
 * @package App\MediaService
 */
class MediaService
{

    public function needUpload(string $link, string $md5)
    {
        $response = App::$app->providerService()->get(Setting::getSetting('main_domain') . '/?mediaparser_path=post/get&url=' . $link . '&md5=' . $md5 . '&token=' . Setting::getSetting('token'));
        $response = json_decode($response, true);

        return $response;
    }

    public function processLink(string $link, AbstractArticleParser $articleParser, $parser): int
    {
        //TODO return status
        $parserData = $parser->data;

        $page = App::$app->providerService()->get($link);
        $article = $articleParser->parse($page);
        $article->link = $link;


        $text = $article->text;
        $article->filterText($parser);

        $data = [
            'title' => $article->title,
            'content' => $article->text,
            'author' => $article->author,
            'label' => $article->label,
            'category' => $article->category,
            'date' => $article->date,
            'link' => $article->link,
            'parser' => $parserData['alias'],
            'md5' => md5($text),
        ];


        try {
            $needUpload = $this->needUpload($link, md5($text));
            if ($needUpload['status'] == 1 && $parserData['auto_update']) {
                $response = App::$app->providerService()->post(Setting::getSetting('main_domain') . '/?mediaparser_path=post/update&id=' . $needUpload['post_id'] . '&token=' . Setting::getSetting('token'), $data);
            } elseif ($needUpload['status'] == 0) {
                $response = App::$app->providerService()->post(Setting::getSetting('main_domain') . '/?mediaparser_path=post/new&token=' . Setting::getSetting('token'), $data);
            }
            if ($needUpload['status'] >= 0) {
                Upload::insert([
                    'parser_alias' => $parserData['alias'],
                    'parser_id' => $parserData['id'],
                    'datetime' => date('Y-m-d H:i:s'),
                    'status' => $needUpload['status'],
                    'link' => $link
                ]);
            }


            return $needUpload['status'];
        } catch (\Exception $e) {
            App::$app->logger()->error($parserData['alias'] . ': ' . $e->getMessage());
        }
    }
}