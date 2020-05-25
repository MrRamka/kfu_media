<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    private $pdo;

    public function __construct()
    {
        $config = App::$app->getConfig();
        if (!isset($config['db'])) {
            throw new \Exception('DB is not configured');
        }

        $config = $config['db'];
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
        $this->charset = $config['charset'];
        $this->db = $config['db'];

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
        } catch (PDOException $e) {
            throw new \Exception('Подключение не удалось: ' . $e->getMessage());
        }
    }

    public function all($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function one($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function scalar($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data[key($data)];
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO {$table} SET " . $this->pdoSet($data);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function update($table, $data, $condition): bool
    {
        $where = '';
        $conditionData = $data;

        if (is_array($condition)) {
            $where = [];
            foreach ($condition as $key => $value) {
                $conditionData[$key] = $value;
                $where[] = "$key = :{$key}";
            }
            $where = implode(' AND ', $where);
        } elseif ((int)$condition > 0) {
            $where = 'id=:id';
            $conditionData['id'] = $condition;
        }
        $sql = "UPDATE {$table} SET " . $this->pdoSet($data) . ' WHERE ' . $where;
        $stmt = $this->pdo->prepare($sql);


        return $stmt->execute($conditionData);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);
    }

    private function pdoSet($data)
    {
        unset($data['id']);
        $set = '';
        foreach ($data as $field => $value) {
            $set .= "`{$field}`" . "=:$field, ";
        }
        return substr($set, 0, -2);
    }


}