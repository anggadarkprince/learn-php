<?php

/**
 * Get input from user.
 *
 * @param string $value
 * @return string
 */
function input(string $value): string
{
    echo "$value: ";
    $result = fgets(STDIN);
    return trim($result);
}