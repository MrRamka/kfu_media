<?php


namespace App\Actions\process;


use App\Abstracts\AbstractArticleParser;
use App\Abstracts\AbstractParser;
use App\Action;
use App\App;
use App\Model\Parser;
use App\Model\Setting;

class ArticleAction extends Action
{
    public function run(): void
    {
        /**
         * @var $articleClass AbstractParser
         * @var $parserClass AbstractArticleParser
         * */
        //token comparison
        $token = $_GET['token'] ?? '';
        if ($token != Setting::getSetting('token'))
            die('Ошибка: неверный токен');
        $link = $_GET['link'] ?? '';
        $parserName = $_GET['parser'] ?? '';
        if (!$link || !$parserName) die('Ошибка: недостаток данных');

        $parser = Parser::one(['alias' => $parserName, 'enabled' => 1]);
        if (!$parser) die('Ошибка: не найден парсер');

        if (class_exists($parser['namespace_article']) && class_exists($parser['namespace'])) {
            $articleClass = new $parser['namespace_article'];
            $parserClass = new $parser['namespace'];
        } else die('Ошибка парсера');

        $parserClass->data = $parser;

        $status = App::$app->mediaService()->processLink($link, $articleClass, $parserClass);

        if ($status == 1)
            die('Добавлена версия. Обновите страницу');

        if ($status == -1)
            die('Новых версий нет');

    }
}