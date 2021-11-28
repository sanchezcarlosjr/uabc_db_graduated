<?php

namespace model;

use infrastructure\Database;

abstract class Model
{
    protected string $table;

    public static function list(): array
    {
        return self::factory()->all();
    }

    public function all()
    {
        return [
            'fields' => ['A', 'B', 'C', 'D', 'E'],
            'data' => [
                [
                    'A' => '1',
                    'B' => '2',
                    'C' => '3',
                    'D' => '4',
                    'E' => '5'
                ],
                [
                    'A' => '10',
                    'B' => '20',
                    'C' => '30',
                    'D' => '40',
                    'E' => '50'
                ]
            ]
        ];
    }

    protected static function factory(): Model
    {
        $class = get_called_class();
        return new $class;
    }

    public static function create(): void
    {
        self::factory()->save([]);
    }

    public function save($values)
    {
        Database::getInstance()->save($this->table, $values);
    }
}