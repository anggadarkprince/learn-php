<?php

$name = "Angga";
$name = null;

$age = null;

echo "Name : ";
echo $name;
echo "\n";

echo "Age : ";
echo $age;
echo "\n";

echo "Is Name Null? : ";
var_dump(is_null($name));
echo "\n";

$example = "Angga";
unset($example);

$example = "Ari";
$example = null;

var_dump(isset($example));