<?php
$title = "Hello PHP & HTML";
$body = "This is a body";
?>

<html lang="en">
<head>
    <title><?php echo $title ?></title>
</head>
<body>
<h1><?= $body ?></h1>
</body>
</html>