<?php

namespace Parsers\UniclinicParser;

use App\Abstracts\AbstractParser;
use App\App;
use DiDom\Document;
use DiDom\Exceptions\InvalidSelectorException;

class Parser extends AbstractParser
{
    public $link = "https://uniclinic.kpfu.ru/?page_id=520";

    public function parse(string $resource): void
    {
        $document = new Document($resource);

        if (!$document->has('#content')) {
            App::$app->logger()->error("Ошибка парсинга страницы " . $this->link);
            return;
        }

        try {
            // ищем ссылки на странице
            // совет: смотрите где удобнее выцепить ссылки, в случае с сайтом химфака, удобнее всего было брать дату поста, т.к. там есть ссылка и класс
            $links = $document->first('#content')->find('a[class*=btn btn-xs btn-default text-xs text-uppercase float-sm-right]');
        } catch (InvalidSelectorException $e) {
            App::$app->logger()->error($e->getMessage());
        }
        if (empty($links)) return;

        $article = new ArticleParser();
        foreach ($links as $link) {

            // осуществляем добавление статьи в базу
            App::$app->mediaService()->processLink($link->attr('href'), $article);
        }

    }
}