<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM admins";

$statement = $connection->query($sql);
$admins = $row = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($admins as $admin) {
    echo "Username: {$admin['username']}" . PHP_EOL;
}

$connection = null;