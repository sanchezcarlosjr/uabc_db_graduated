<?php

namespace model;

use infrastructure\Database as DB;

abstract class Model
{
    protected string $table;
    protected array $fillables;

    public static function allWithColumns(array $fillables = array()): array
    {
        return self::factory()->select($fillables)->getWithColumns();
    }

    public function select(array $fillables = array())
    {
        $fillables = empty($fillables) ? $this->fillables : $fillables;
        return DB::table($this->table, $fillables);
    }

    protected static function factory(): Model
    {
        $class = get_called_class();
        return new $class;
    }
}