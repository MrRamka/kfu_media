<?php

namespace App\Actions\parser;


use App\Action;
use App\Model\Parser;

/**
 * Class MainAction
 * @package App\Actions
 */
class MainAction extends Action
{

    public function run(): void
    {
        $this->title = 'Парсеры';
        $parsers = Parser::all();

        $this->render('parser/index', ['parsers' => $parsers]);
    }
}