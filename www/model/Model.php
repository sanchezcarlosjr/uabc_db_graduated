<?php

namespace model;

use infrastructure\Database;
use infrastructure\QueryBuilder;

abstract class Model
{
    protected string $table;
    protected array $fillables;
    private QueryBuilder $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder();
    }

    public static function all(): array
    {
        return self::factory()->selectAll();
    }

    public function selectAll(): array
    {
        $this->queryBuilder = $this->queryBuilder->select($this->table, $this->fillables);
        return $this->execute();
    }

    private function execute(array $params = array()): array
    {
        return Database::getInstance()->fetch($this->queryBuilder, $params);
    }

    protected static function factory(): Model
    {
        $class = get_called_class();
        return new $class;
    }

    public static function columns(): array
    {
        return self::factory()->getColumns();
    }

    public function getColumns(): array
    {
        if ($this->fillables[0] != "*") {
            return $this->fillables;
        }
        $this->queryBuilder = $this->queryBuilder->findColumns();
        $columns = $this->execute(array('database' => $_ENV['MYSQL_DATABASE'], 'table_name' => $this->table));
        $fields = [];
        foreach($columns as $column) {
            array_push($fields, $column['COLUMN_NAME']);
        }
        return $fields;
    }
}