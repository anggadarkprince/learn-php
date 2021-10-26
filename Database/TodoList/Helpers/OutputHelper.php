<?php

namespace TodoList\Helpers;

class OutputHelper
{

    /**
     * Show output color.
     *
     * @param $str
     * @param string $type
     */
    public static function output($str, $type = 'i'): void
    {
        switch ($type) {
            case 'e': //error
                echo "\033[31m$str \033[0m" . PHP_EOL;
                break;
            case 's': //success
                echo "\033[32m$str \033[0m" . PHP_EOL;
                break;
            case 'w': //warning
                echo "\033[33m$str \033[0m" . PHP_EOL;
                break;
            case 'i': //info
                echo "\033[36m$str \033[0m" . PHP_EOL;
                break;
            default:
                echo $str . PHP_EOL;
                break;
        }
    }

}
