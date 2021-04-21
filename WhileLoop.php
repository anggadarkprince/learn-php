<?php

// while loop with single condition,
// no template initial value or expression to manipulate the initiator
$counter = 1;
while ($counter <= 10) {
    echo "This is for while-$counter" . PHP_EOL;
    $counter++;
}

// condition is managed outside the syntax
$counter = 1;
while ($counter <= 10) :
    echo "This is for while-$counter" . PHP_EOL;
    $counter++;
endwhile;

// can produce infinite loop that for-loop cannot do
while (true) {
    $value = rand(1, 100);
    echo $value . PHP_EOL;
    if ($value < 10) {
        break;
    }
}