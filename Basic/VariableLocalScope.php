<?php

function createName() {
    $name = "Angga"; // local scope inside function { scope }
}

createName();
echo $name . PHP_EOL; // cannot access $name variable inside createName() and try to find in global variable
