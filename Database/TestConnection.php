<?php

$host = "localhost";
$port = 3306;
$database = "sandbox";
$username = "root";
$password = "";

try {
    $connection = new PDO("mysql:host={$host}:{$port};dbname={$database}", $username, $password);
    echo "Connection success";

    // close connection
    // $connection = null;
} catch (PDOException $e) {
    echo "Failed to connect database: {$e->getMessage()}";
}