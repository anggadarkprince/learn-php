<?php
$firstName = "Angga";
$lastName = "Ari Wijaya";

// normal function (anonymous stored in variable)
$anonymousFunction = function () use ($firstName, $lastName) : string {
    return "Hello {$firstName} {$lastName}" . PHP_EOL;
};

// shorter version of default function keyword
// for simple statement and must return value
$arrowFunction = fn() => "Hello $firstName $lastName" . PHP_EOL;

// will result the same this
echo $anonymousFunction();
echo $arrowFunction();