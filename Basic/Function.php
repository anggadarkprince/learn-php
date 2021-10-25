<?php

// create function
function hello() {
    echo "Hello" . PHP_EOL;
}

// invoke the function
hello();

// try to set false
$createFunction = true;

if ($createFunction) {
    function sayHello() {
        echo "Hello Function" . PHP_EOL;
    }
}

// try to resolve existing function if defined
// Uncaught Error: Call to undefined function sayHello() will produced if function is not defined
sayHello();
sayHello();
sayHello();
sayHello();
sayHello();
