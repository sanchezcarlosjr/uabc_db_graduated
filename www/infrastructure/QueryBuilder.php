<?php

namespace infrastructure;

class QueryBuilder
{
    private string $query = "";
    private string $table = "";
    private array $params = array();

    public function __construct(string $query = "", string $table = "")
    {
        $this->raw($query);
        $this->setTable($table);
    }

    public function raw(string $query): QueryBuilder
    {
        $this->query = $query;
        return $this;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
    }

    public function select(array $values = array('*')): QueryBuilder
    {
        $query = implode(",", $values);
        return $this->raw("SELECT $query FROM $this->table");
    }

    public function insert(array $params): QueryBuilder
    {
        $this->params = array_values($params);
        $keys = implode(', ', array_keys($params));
        $values = str_repeat('?, ', count($params) - 1) . '?';
        return $this->raw("INSERT INTO $this->table($keys) VALUES ($values)");
    }

    public function destroy(string $key, string $id): QueryBuilder
    {
        return $this->raw("DELETE FROM $this->table WHERE $key=$id");
    }

    public function update(array $params): QueryBuilder
    {
        $this->params = array_values($params);
        $values = implode(' = ?,', array_keys($params)).' = ?';
        return $this->raw("UPDATE $this->table SET $values");
    }

    public function where(string $key, string $op, string $value)
    {
        array_push($this->params, $value);
        return $this->add("WHERE $key $op ?");
    }

    public function findColumns()
    {
        $database = $_ENV['MYSQL_DATABASE'];
        $query = "select column_name from information_schema.columns " .
            "where table_schema = \"$database\" and table_name = \"$this->table\"";
        return $this->raw($query);
    }

    function get(array $params = array()): array
    {
        $params = empty($params) ? $this->params : $params;
        return Database::getInstance()->fetch($this, $params);
    }

    private function add(string $query): QueryBuilder {
        $this->raw($this->query." ".$query);
        return $this;
    }

    function getWithColumns(array $params = array()): array
    {
        return Database::getInstance()->fetchWithColumns($this, $params);
    }

    public function __toString()
    {
        return $this->query;
    }
}