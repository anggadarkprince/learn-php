<?php

namespace TodoList\Config {

    use PDO;

    class Database
    {

        static function getConnection(): PDO
        {
            $host = "localhost";
            $port = 3306;
            $database = "todolist";
            $username = "root";
            $password = "";

            $pdo = new PDO("mysql:host={$host}:{$port};dbname={$database}", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }

    }
}