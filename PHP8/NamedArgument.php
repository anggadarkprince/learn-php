<?php

function sayHello(string $first, string $middle = "", string $last): void
{
    echo "Hello $first $middle $last" . PHP_EOL;
}


sayHello("Angga", "Ari", "Wijaya");
// sayHello("Angga", "Ari"); // error

sayHello(last: "Wijaya", first: "Angga", middle: "Ari");
sayHello(first: "Angga", last: "Wijaya");