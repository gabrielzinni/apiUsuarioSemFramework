<?php

namespace App\config;

class DB
{
    public static function connect()
    {
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $db = "test";

        return new \PDO("mysql:host={$host};dbname={$db};charset=UTF8;", $username, $password);
    }
}
