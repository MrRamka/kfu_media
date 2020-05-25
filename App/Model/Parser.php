<?php

namespace App\Model;

use App\App;

class Parser extends Model
{
    public $errors = [];

    public static function tableName(): string
    {
        return 'parser';
    }

    public function validate(&$data): bool
    {
        $data['name'] = $data['name'] ?? '';
        $data['alias'] = $data['alias'] ?? '';
        $data['namespace'] = $data['namespace'] ?? '';
        $data['namespace_article'] = $data['namespace_article'] ?? '';
        $data['enabled'] = $data['enabled'] ?? 0;
        $data['auto_update'] = $data['auto_update'] ?? 0;

        if ($data['enabled'] === 'on') $data['enabled'] = 1;
        if ($data['auto_update'] === 'on') $data['auto_update'] = 1;
        if (!$data['name']) {
            $this->addError('name', 'Поле не должно быть пустым');
        }
        if (!$data['alias']) {
            $this->addError('alias', 'Поле не должно быть пустым');
        }
        if (!$data['namespace']) {
            $this->addError('namespace', 'Поле не должно быть пустым');
        }
        if (!$data['namespace_article']) {
            $this->addError('namespace_article', 'Поле не должно быть пустым');
        }


        if (!empty($this->errors)) return false;
        return true;
    }

    public function save($data): bool
    {
        if ($this->validate($data)) {
            $id = $data['id'] ?? null;
            if ($id)
                App::$app->db()->update(static::tableName(), $data, $id);
            else
                App::$app->db()->insert(static::tableName(), $data);

            return true;

        } else return false;
    }

    private function addError($field, $message): void
    {
        $this->errors[] = ['field' => $field, 'message' => $message];
    }

    public function delete($id)
    {
        App::$app->db()->delete(static::tableName(), $id);
    }

}