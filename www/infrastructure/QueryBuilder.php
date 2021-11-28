<?php

namespace infrastructure;

class QueryBuilder
{
    private string $query = "";

    public function __construct(string $query = "")
    {
        $this->raw($query);
    }

    public function raw(string $query): QueryBuilder
    {
        $this->query = $query;
        return $this;
    }

    public function select($table, $values)
    {
        $query = implode(",", $values);
        return $this->raw("SELECT $query FROM $table");
    }

    public function findColumns()
    {
        $query = "select column_name from information_schema.columns " .
            "where table_schema = :database and table_name = :table_name";
        return $this->raw($query);
    }

    public function __toString()
    {
        return $this->query;
    }
}