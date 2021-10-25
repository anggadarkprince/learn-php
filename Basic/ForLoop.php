<?php

// common loop from for(initial value; condition; expresion that manipulated each loop)
for ($counter = 1; $counter <= 10; $counter++) {
    echo "This is for loop-$counter" . PHP_EOL;
}

for ($counter = 10; $counter >= 1; $counter--) {
    echo "This is for loop-$counter" . PHP_EOL;
}

// another syntax for-loop without curly braces
for ($counter = 1; $counter <= 10; $counter++):
    echo "This is for loop-$counter" . PHP_EOL;
endfor;

for ($counter = 10; $counter >= 1; $counter--):
    echo "This is for loop-$counter" . PHP_EOL;
endfor;