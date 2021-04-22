<?php

function increment() {
    static $counter = 1; // static scope (keep data in memory until program stopped)
    echo "Counter = $counter" . PHP_EOL;
    $counter++;
}

function decrement() {
    $counter = 10; // local variable always 10 each this function is invoked
    echo "Counter = $counter" . PHP_EOL;
    $counter--;
}


increment();
increment();
increment();
increment();
increment();
increment();

decrement();
decrement();
decrement();