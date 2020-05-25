<?php


namespace App\Actions\parser;


use App\Action;
use App\Model\Parser;

class SaveAction extends Action
{
    public function run(): void
    {
        if (isset($_POST['parser'])) {
            $data = $_POST['parser'];
            $parser = new Parser();

            if ($parser->save($data)) {
                die(json_encode(['status' => true, 'autoReload' => !isset($data['id'])]));
            } else {
                $errors = $parser->errors;
                die(json_encode(['status' => false, 'errors' => $errors]));
            }
        }
    }
}