<?php
session_start();

if ($_SESSION['login'] != true) {
    header('Location: /session/login.php');
    exit();
}

$say = "Hello " . $_SESSION['username'];
?>

<html lang="en">
<body>
<h1><?= $say ?></h1>
<a href="/session/logout.php">Logout</a>
</body>
</html>