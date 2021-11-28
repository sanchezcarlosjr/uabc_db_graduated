<?php

namespace infrastructure;

use JetBrains\PhpStorm\ArrayShape;
use PDO;
use PDOStatement;

class Database
{
    private static Database $database;
    private ?PDO $pdo;

    protected function __construct(string $hostname, string $username, string $password, string $dbname)
    {
        $database = "mysql:dbname=$dbname;host=$hostname:3306";
        $this->pdo = new PDO($database, $username, $password);
    }

    public static function raw(string $sql)
    {
        return new QueryBuilder($sql);
    }

    #[ArrayShape(['rows' => "array"])] public function fetch(QueryBuilder $queryBuilder, array $params = array()): array
    {
        return [
            'rows' => $this->execute($queryBuilder, $params)->fetchAll(PDO::FETCH_ASSOC)
        ];
    }

    public function execute(QueryBuilder $queryBuilder, array $params = array()): bool|PDOStatement
    {
        $sth = $this->pdo->prepare($queryBuilder);
        $sth->execute($params);
        return $sth;
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

    public static function table($table): QueryBuilder
    {
        return new QueryBuilder(table: $table);
    }

    #[ArrayShape(['columns' => "array", 'rows' => "array"])] public function fetchWithColumns(QueryBuilder $queryBuilder, array $params = array()): array
    {
        $sth = $this->execute($queryBuilder, $params);
        return [
            'columns' => $this->fetchColumns($sth),
            'rows' => $sth->fetchAll(PDO::FETCH_ASSOC)
        ];
    }

    protected function fetchColumns(PDOStatement $sth): array
    {
        for ($i = 0; $i < $sth->columnCount(); $i++) {
            $columns[] = $sth->getColumnMeta($i)['name'];
        }
        return $columns;
    }
}