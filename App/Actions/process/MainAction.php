<?php

namespace App\Actions\process;

use App\Abstracts\AbstractParser;
use App\Action;
use App\App;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;

/**
 * Class MainAction
 * @package App\Actions\process
 */
class MainAction extends Action
{
    public function run(): void
    {
        set_time_limit(0);
        $parsers = App::$app->getParsers();
        $promises = [];

        foreach ($parsers as $parserName => $parserData) {
            $parserClass = $parserData['namespace'];
            if (!file_exists($parserClass . '.php')) {
                App::$app->logger()->error("{$parserClass}.php not found");
                continue;
            }
            $parser = new $parserClass;
            if (!($parser instanceof AbstractParser)) continue;
            $parser->data = $parserData;

            $promises[$parserName] = App::$app->guzzle()->getAsync($parser->link)->then(
                function (ResponseInterface $res) use ($parser, $parserName) {
                    App::$app->logger()->info("Запуск парсера {$parserName}");
                    $parser->parse($res->getBody());
                },
                function (RequestException $e) {
                    App::$app->logger()->error($e->getMessage());
                }
            );

        }
        $responses = Promise\settle($promises)->wait();
    }
}