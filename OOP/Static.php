<?php

require_once "helpers/MathHelper.php";

use Helper\MathHelper;

// static function and property use from class name without creating object
echo MathHelper::$name . PHP_EOL;

MathHelper::$name = "Angga Ari Wijaya";
echo MathHelper::$name . PHP_EOL;

$result = MathHelper::sum(10, 10, 10, 10, 10);
echo "Result : $result" . PHP_EOL;

// non static require object
$math = new MathHelper();
$multiple = $math->multiply(3, 5);
echo "Result multiply 3x5 = $multiple";