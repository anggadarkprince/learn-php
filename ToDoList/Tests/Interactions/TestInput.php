<?php

require_once "../../Helpers/Input.php";

$name = input("Name");
echo "Hello $name" . PHP_EOL;

$profession = input("Profession");
echo $profession . PHP_EOL;