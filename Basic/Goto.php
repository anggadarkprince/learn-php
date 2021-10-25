<?php

// goto is a statement jumper,
// line of code labelled with :label-name and to jump type goto "label-name"

goto a; // 1. will jump to a:

b: // 4. executed here
echo "Hello World" . PHP_EOL;

a: // 2. executed from here
echo "Hello A" . PHP_EOL; // 5. executed here

// this line caused infinity loop
// goto b; // 3. jump to b: , 6. will jump to b: again over and over infinitely

$counter = 1;

// using goto as circuit breaker
while (true) {
    echo "This is for while-$counter" . PHP_EOL;
    $counter++;

    if ($counter > 10) {
        goto end;
    }
}

end:
echo "End Loop";

// using goto caused confusing while reading a code,
// and often produce problem such as infinity execution