<?php

for ($counter = 1; $counter <= 100; $counter++) {
    // skip rest of code and continue the loop
    if ($counter % 2 == 0) {
        continue;
    }
    echo "Counter : $counter" . PHP_EOL;
}