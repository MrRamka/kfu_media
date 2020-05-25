<?php

namespace App\Model;

use App\App;

class Model
{
    public static function tableName(): string
    {
        return 'default';
    }

    public static function all($params = [])
    {
        $table = static::tableName();
        $db = App::$app->db();

        $sql = 'SELECT * FROM ' . $table;
        $sql .= self::prepareParams($params);


        $data = $db->all($sql, $params);
        return $data;
    }

    public static function one($params)
    {
        $table = static::tableName();
        $db = App::$app->db();

        $sql = 'SELECT * FROM ' . $table;
        $sql .= self::prepareParams($params);
        $data = $db->one($sql, $params);

        return $data;
    }

    public static function insert($data)
    {
        $table = static::tableName();
        $db = App::$app->db();
        $db->insert($table, $data);
    }

    public static function tableData($filter = [], $pager = [], $order = [])
    {
        $table = static::tableName();
        $db = App::$app->db();

        $sql = 'SELECT * FROM ' . $table;
        $sql .= self::prepareParams($filter);
        $limit = $pager['limit'] ?? 20;
        $page = abs($pager['page'] ?? ($_GET['page'] ?? 1));
        if ($page == 0) $page++;
        $count = $db->scalar(str_replace('*', 'COUNT(*)', $sql), $filter);
        if ($page > ceil($count / $limit)) $page = ceil($count / $limit);
        $page--;

        if ($count) {
            if (!empty($order) && count($order) == 2)
                $sql .= " ORDER BY {$order[0]} {$order[1]}";
            $offset = $limit * $page;
            $sql .= " LIMIT {$offset}, $limit";

            $data = $db->all($sql, $filter);
            $pager['page'] = ++$page;
            $pager['maxPage'] = ceil($count / $limit);
            return ['data' => $data, 'count' => $count, 'pager' => $pager];
        } else return ['data' => [], 'count' => 0];
    }

    private static function prepareParams($params)
    {
        $sql = '';
        if (!empty($params)) {
            $sql .= ' WHERE ';
            $where = [];
            foreach ($params as $field => $Value) $where[] = "`{$field}` = :{$field}";

            $sql .= implode(' AND ', $where);
        }
        return $sql;
    }
}