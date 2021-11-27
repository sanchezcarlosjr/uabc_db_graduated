<?php

class Model
{
    protected string $table;

    public function save($values)
    {
        Database::getInstance()->save($this->table, $values);
    }
}