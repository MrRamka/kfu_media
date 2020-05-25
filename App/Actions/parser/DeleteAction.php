<?php


namespace App\Actions\parser;


use App\Action;
use App\Model\Parser;

class DeleteAction extends Action
{
    public function run(): void
    {
        $id = (int)$_GET['id'];
        (new Parser())->delete($id);

        $this->redirect('/parser');
    }
}