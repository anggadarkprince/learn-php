<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = <<<SQL
    INSERT INTO comments(email, comment)
    VALUES("angga.ari@mail.com", "Hi, there")
SQL;

$connection->exec($sql);
$id = $connection->lastInsertId();

echo $id . PHP_EOL;

$connection = null;