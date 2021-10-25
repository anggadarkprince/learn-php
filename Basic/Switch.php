<?php

$score = "E";

// switch same as if with equal comparator (else-if) only and default (else)
switch ($score){
    case "A":
        echo "You are passed really well" . PHP_EOL;
        break;
    case "B":
    case "C":
        echo "You are passed" . PHP_EOL;
        break;
    case "D":
        echo "You are not passed" . PHP_EOL;
        break;
    default:
        echo "May be you would dropped off" . PHP_EOL;
}

// another syntax without curly braces
switch ($score):
    case "A":
        echo "You are passed really well" . PHP_EOL;
        break;
    case "B":
    case "C":
        echo "You are passed" . PHP_EOL;
        break;
    case "D":
        echo "You are not passed" . PHP_EOL;
        break;
    default:
        echo "May be you would dropped off" . PHP_EOL;
endswitch;