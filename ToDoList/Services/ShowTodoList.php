<?php

require_once __DIR__ . "/../Helpers/Output.php";

/**
 * Show todo list to console.
 */
function showTodoList()
{
    global $todoList;

    echo "TODO LIST" . PHP_EOL;

    foreach ($todoList as $index => $item) {
        echo " $index. $item" . PHP_EOL;
    }

    if (empty($todoList)) {
        output(" Todo is empty", "w") . PHP_EOL;
    }
}