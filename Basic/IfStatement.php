<?php

$value = 10;
$present = 90;

// structure control depends on the requirement is met or not
// any boolean result will evaluated to decide the if block is would executed
if (true) {
    echo "This statement is always executed" . PHP_EOL;
}

if (false) {
    echo "This statement is never executed" . PHP_EOL;
}

if ($value >= 80 && $present >= 80) {
    echo "Your Score A" . PHP_EOL;
} else if ($value >= 70 && $present >= 70) {
    echo "Your Score B" . PHP_EOL;
} else if ($value >= 60 && $present >= 60) {
    echo "Your Score C" . PHP_EOL;
} else if ($value >= 50 && $present >= 50) {
    echo "Your Score D" . PHP_EOL;
} else {
    echo "Your Score E" . PHP_EOL;
}

// another syntax without curly braces
if ($value >= 80 && $present >= 80) :
    echo "Your Score A" . PHP_EOL;
elseif ($value >= 70 && $present >= 70):
    echo "Your Score B" . PHP_EOL;
elseif ($value >= 60 && $present >= 60):
    echo "Your Score C" . PHP_EOL;
elseif ($value >= 50 && $present >= 50):
    echo "Your Score D" . PHP_EOL;
else :
    echo "Your Score E" . PHP_EOL;
endif;