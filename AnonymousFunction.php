<?php

$sayHello = function (string $name) {
    echo "Hello {$name}" . PHP_EOL;
};

$sayHello("Angga");
$sayHello("Ari");

// function that accept variable function
function sayGoodBye(string $name, $filter) {
    $filteredName = $filter($name);
    echo "Hi, $filteredName" . PHP_EOL;
}

// inline anonymous function
sayGoodBye("Angga", function (string $name): string {
    if ($name == '123') {
        return '-';
    }
    return strtoupper($name);
});

// passing function variable
$filterFunction = function (string $name): string {
    return strtoupper($name);
};
sayGoodBye("Angga", $filterFunction);

// use external variable into anonymous function
$firstName = "Angga";
$lastName = "Ari";

$sayHelloAngga = function () use ($firstName, $lastName) {
    echo "Hello {$firstName} {$lastName}" . PHP_EOL;
};
$sayHelloAngga();

// change passed variable does not change the result
$firstName = "Arga";
$lastName = "Nugraha";

// this function keep returning Hello "Angga" "Ari"
$sayHelloAngga();