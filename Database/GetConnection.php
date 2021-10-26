<?php

function getConnection() {
    $host = "localhost";
    $port = 3306;
    $database = "sandbox";
    $username = "root";
    $password = "";

    $pdo = new PDO("mysql:host={$host}:{$port};dbname={$database}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}