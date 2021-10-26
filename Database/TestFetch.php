<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admins WHERE username = :username AND password = :password";

$statement = $connection->prepare($sql);
$statement->execute([':username' => $username, ':password' => $password]);

if ($row = $statement->fetch()) {
    echo "Success login: {$row['username']}";
} else {
    echo "User or password wrong";
}

$connection = null;