<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin'; #";
$password = "admin";

$sql = "SELECT * FROM admins WHERE username = ? AND password = ?";

$statement = $connection->prepare($sql);
$statement->bindParam(1, $username); // start from 1 not 0
$statement->bindParam(2, $password);
$statement->execute();

//$sql = "INSERT INTO admins(username, password) VALUES(:username, :password)";
//$statement = $connection->prepare($sql);
//$statement->execute([$username, $password]);

$success = false;
$foundUser = null;
foreach ($statement as $row) {
    $success = true;
    $foundUser = $row['username'];
}

if ($success) {
    echo "Success login: {$foundUser}";
} else {
    echo "User or password wrong";
}

$connection = null;