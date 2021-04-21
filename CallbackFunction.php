<?php

// type "callable" invoked with call_user_func()
function sayHello(string $name, callable $filter) {
    // fist param is the variable, rest of it is arguments
    $finalName = call_user_func($filter, $name);
    echo "Hello $finalName" . PHP_EOL;
}

// passed string function (auto resolved in scope)
sayHello("Angga", "strtoupper");
sayHello("Angga", "strtolower");

// passing inline anonymous function
sayHello("Angga", function (string $name): string {
    return strtoupper($name);
});

// passing arrow function
sayHello("Angga", fn($name) => strtoupper($name));