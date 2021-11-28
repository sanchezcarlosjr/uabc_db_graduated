<?php

namespace model;

use infrastructure\Database as DB;

abstract class Model
{
    protected string $table;
    protected array $fillables;
    protected string $primary_key;

    public static function allWithColumns(array $fillables = array()): array
    {
        $result = self::factory()->select($fillables)->getWithColumns();
        array_push($result, ['primary_key' => self::factory()->primary_key]);
        return $result;
    }

    public function select(array $fillables = array())
    {
        $fillables = empty($fillables) ? $this->fillables : $fillables;
        return DB::table($this->table)->select($fillables);
    }

    protected static function factory(): Model
    {
        $class = get_called_class();
        return new $class;
    }

    public static function allColumns(): array
    {
        return self::factory()->columns();
    }

    public function columns()
    {
        if ($this->fillables[0] != '*') {
            return $this->fillables;
        }
        $columns = DB::table($this->table)->findColumns()->get();
        $fillables = array();
        foreach($columns['rows'] as $column) {
            array_push($fillables, $column['COLUMN_NAME']);
        }
        return $fillables;
    }

    public static function columnsNoPrimaryKey(): array
    {
        return self::factory()->columnsUnsetPrimaryKey();
    }

    public static function create(array $values)
    {
        return self::factory()->insert($values)->get();
    }

    public static function destroy(string $id): array
    {
        return self::factory()->delete($id)->get();
    }

    public function delete(string $id = "")
    {
        return DB::table($this->table)->destroy($this->primary_key, $id);
    }

    public function insert(array $values)
    {
        return DB::table($this->table)->insert($values);
    }

    public function columnsUnsetPrimaryKey(): array
    {
        return array_diff($this->columns(), [$this->primary_key]);
    }
}