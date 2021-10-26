<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = $connection->quote("admin'; #"); // not recommended, use prepare statement instead
$password = $connection->quote("admin");
$sql = "SELECT * FROM admins WHERE username = {$username} AND password = {$password}";

echo $sql . "\n";

$result = $connection->query($sql);

$success = false;
$foundUser = null;
foreach ($result as $row) {
    $success = true;
    $foundUser = $row['username'];
}

if ($success) {
    echo "Success login: {$foundUser}";
} else {
    echo "User or password wrong";
}

$connection = null;