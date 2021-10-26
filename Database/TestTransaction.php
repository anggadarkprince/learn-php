<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$connection->beginTransaction();

$connection->exec('INSERT INTO comments(email, comment) VALUES("angga.ari@mail.com", "Hi, there")');
$connection->exec('INSERT INTO comments(email, comment) VALUES("angga.ari@mail.com", "Hi, there")');
$connection->exec('INSERT INTO comments(email, comment) VALUES("angga.ari@mail.com", "Hi, there")');

//$connection->rollBack();

$connection->commit();

$connection = null;