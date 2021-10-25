<?php

function foo() {
    echo "Foo" . PHP_EOL;
}

function bar() {
    echo "Bar" . PHP_EOL;
}

// assign function strong name into variable
$functionCaller = "foo";
$functionCaller();

$functionCaller = "bar";
$functionCaller();

// passing function as parameter
function sayHello(string $name, $filter) {
    $finalName = $filter($name);
    echo "Hello $finalName" . PHP_EOL;
}

function sampleFunction(string $name): string {
    return "Sample $name";
}
$sample = function (string $name): string {
    return "Sample - $name";
};

sayHello("Angga ari", $sample);
sayHello("Angga", "sampleFunction");
sayHello("ari", "strtoupper");
sayHello("WIJAYA", "strtolower");
