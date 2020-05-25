<?php

namespace Parsers\UniclinicParser;
use App\Abstracts\AbstractArticleParser;
use App\MediaService\Article;
use DiDom\Document;

class ArticleParser extends AbstractArticleParser
{
    public function parse(string $resource): Article
    {
        $model = new Article();
        $text = '';

        $document = new Document(null, false, 'windows-1251');
        $document->loadHtml($resource);


        if ($document->has('.post-date')) {
            $date = $document->first('time')->text();// совет: проверяйте, нет ли других элементов с таким же классом, может нужно искать более узко

            // приходится заменять дату, тк PHP не работает с русским языком
            $months = [
                'января' => 'january',
                'февраля' => 'february',
                'марта' => 'march',
                'апреля' => 'april',
                'мая' => 'may',
                'июня' => 'june',
                'июля' => 'jule',
                'августа' => 'august',
                'сентября' => 'september',
                'октября' => 'october',
                'ноября' => 'november',
                'декабря' => 'december',
            ];

            $model->date = strtotime($date);
        }
        if ($document->has('#content')) {
            $element = $document->first('.entry-title');
            $model->title = mb_convert_encoding($element->text(), 'windows-1251');
            $element = $document->first('.meta-author');
            $model->author = mb_convert_encoding($element->text(), 'windows-1251');
            $element = $document->first('.entry-content');
            $model->text = mb_convert_encoding($element->html(), 'windows-1251');
        }
        return $model;
    }

    // DiDom парсит с пробелами, приходится делать вот так
    private function nextNotEmptySibling(\DiDom\Element $element)
    {
        $element = $element->nextSibling();
        while ($element->html() == '') $element = $element->nextSibling();

        return $element;
    }
}