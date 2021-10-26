<?php

namespace TodoList\Helpers;

class InputHelper
{

    /**
     * Get input from user.
     *
     * @param string $value
     * @return string
     */
    public static function input(string $value): string
    {
        echo "$value: ";
        $result = fgets(STDIN);
        return trim($result);
    }

}
