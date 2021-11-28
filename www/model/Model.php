<?php

namespace model;

use infrastructure\Database;
use infrastructure\QueryBuilder;

abstract class Model
{
    protected string $table;
    protected array $fillable;
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
        $this->queryBuilder = $this->queryBuilder->select($this->table, $this->fillable);
        return $this->execute();
    }

    private function execute(array $params = array())
    {
        return Database::getInstance()->fetch($this->queryBuilder, $params);
    }

    protected static function factory(): Model
    {
        $class = get_called_class();
        return new $class;
    }
}