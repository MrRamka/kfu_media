<?php

namespace App\Model;

use App\App;

class Setting extends Model
{
    public static function tableName(): string
    {
        return 'setting';
    }

    public static function getSetting($alias)
    {
        $row = self::one(['alias' => $alias]);
        if ($row) return $row['value'];
        else return false;
    }

    public static function save($data): bool
    {
        $status = true;
        foreach ($data as $key => $value) {
            $tmp = App::$app->db()->update(static::tableName(), ['value' => $value], ['alias' => $key]);
            if (!$tmp) $status = false;
        }
        return $status;
    }
}