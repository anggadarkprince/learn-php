<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM customers";

$result = $connection->query($sql);

foreach ($result as $row) {
    //var_dump($row);
    echo "ID: {$row['id']}" . PHP_EOL;
    echo "Name: {$row['name']}" . PHP_EOL;
    echo "Email: {$row['email']}" . PHP_EOL;
    echo PHP_EOL;
}

$connection = null;