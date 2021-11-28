<?php

namespace infrastructure;

use Error;
use mysqli;

class Database
{
    private static Database $database;
    private mysqli $mysqli;

    protected function __construct(string $hostname, string $username, string $password, string $database)
    {
        $link = mysqli_connect($hostname, $username, $password, $database);
        if (mysqli_connect_errno() || $link == null || $link == false) {
            throw new Error("MySQL connecttion failed: %s" . mysqli_connect_error());
        }
        $this->mysqli = $link;
    }

    public static function getInstance(): Database
    {
        if (!isset(self::$database)) {
            self::$database = new static("database", "docker", "docker", "docker");
        }
        return self::$database;
    }

    public function save($table, $values)
    {
        $operations = substr(str_repeat("(?),", count($values)), 0, -1);
        $stmt = $this->mysqli->prepare("INSERT INTO " . $table . " VALUES " . $operations);
        $stmt->bind_param('i', ...$values);
        $stmt->execute();
    }

    function __destruct()
    {
        mysqli_close($this->mysqli);
    }
}