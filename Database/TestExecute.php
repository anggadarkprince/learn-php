<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = <<<SQL
    INSERT INTO customers(id, name, email)
    VALUES("angga", "Angga Ari Wijaya", "angga.ari@mail.com")
SQL;

$connection->exec($sql);

$connection = null;