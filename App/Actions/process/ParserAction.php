<?php


namespace App\Actions\process;


use App\Action;
use App\App;
use http\Header\Parser;

class ParserAction extends Action
{
    public function run(): void
    {
        $parser = $_GET['parser'] ?? '';
        if (!$parser) die(json_encode(['status' => false]));

        $parserData = \App\Model\Parser::one(['alias' => $parser]);
        if (!$parserData) die(json_encode(['status' => false]));

        if (!class_exists($parserData['namespace']))
            die(json_encode(['status' => false]));

        $parserClass = new $parserData['namespace'];
        $parserClass->data = $parserData;
        App::$app->logger()->info("Запуск парсера {$parserData['alias']}");

        $data = App::$app->providerService()->get($parserClass->link);
        $parserClass->parse($data);
        die(json_encode(['status' => true]));
    }
}