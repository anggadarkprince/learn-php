<?php

$name = "Angga"; // global scope variable

function sayHello() {
    global $name; // global keyword (make access global variable)
    echo $name . PHP_EOL;

    // global variable can be accessed from $GLOBALS variable
    echo $GLOBALS["name"] . PHP_EOL;
}

sayHello();
