<?php

/**
 * @throws Exception
 */
function validate(string $value)
{
    if (trim($value) == "") {
        throw new Exception("Invalid string");
    }
}

try {
    validate("   ");
} catch (Exception) { // no need declare exception variable if we don't use it
    echo "Invalid" . PHP_EOL;
}