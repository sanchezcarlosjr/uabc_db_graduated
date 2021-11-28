<?php

namespace infrastructure;

class QueryBuilder
{
    private string $query = "";
    private string $table = "";

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

    public function destroy(string $key, string $id): QueryBuilder
    {
        return $this->raw("DELETE FROM $this->table WHERE $key=$id");
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
        return Database::getInstance()->fetch($this, $params);
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