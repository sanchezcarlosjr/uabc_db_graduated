<?php

namespace infrastructure;

use PDO;

class Database
{
    private static Database $database;
    private ?PDO $pdo;

    protected function __construct(string $hostname, string $username, string $password, string $dbname)
    {
        $database = "mysql:dbname=$dbname;host=$hostname:3306";
        $this->pdo = new PDO($database, $username, $password);
    }

    public static function raw(string $sql, array $params = array())
    {
        return self::getInstance()->fetch(new QueryBuilder($sql), $params);
    }

    public function fetch(QueryBuilder $queryBuilder, array $params = array()): array
    {
        $sth = $this->pdo->prepare($queryBuilder);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getInstance(): Database
    {
        if (!isset(self::$database)) {
            self::$database = new static(
                "database",
                'root',
                $_ENV['MYSQL_ROOT_PASSWORD'],
                $_ENV['MYSQL_DATABASE']
            );
        }
        return self::$database;
    }
}