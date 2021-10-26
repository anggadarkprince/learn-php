<?php

// get.php?name=Angga&age=30
$name = htmlspecialchars($_GET['name']); // prevent xss: get.php?name=<script>alert('hello')</script>
$age = htmlspecialchars($_GET['age']);
$say = "Hello " . $name . " " . $age;
?>
<html lang="en">
<head>
    <title>Query Parameter</title>
</head>
<body>
<h1><?= $say ?></h1>
</body>
</html>