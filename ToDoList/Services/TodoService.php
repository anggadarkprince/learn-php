<?php

require_once __DIR__ . "/../Helpers/Output.php";

/**
 * Show todo list to console.
 */
function showTodoList()
{
    global $todoList;

    output("TODO LIST", "s") . PHP_EOL;

    foreach ($todoList as $index => $item) {
        echo " $index. {$item['todo']} ({$item['category']})" . PHP_EOL;
    }

    if (empty($todoList)) {
        output(" Todo is empty", "w") . PHP_EOL;
    }
}

/**
 * Add new todo list item.
 *
 * @param string $todo
 * @param string $category
 */
function addTodoList(string $todo, string $category = 'No Category'): void
{
    global $todoList;

    // using index as number so we start from 1 rather than 0
    $index = sizeof($todoList) + 1;

    $todoList[$index] = [
        'category' => $category,
        'todo' => $todo
    ];
}

/**
 * Delete todo list by index or it's order number.
 *
 * @param int $index
 * @return bool
 */
function deleteTodoList(int $index): bool
{
    global $todoList;

    // return false if index out of range
    if ($index > sizeof($todoList) || $index < 1) {
        return false;
    }

    // loop through the list and shift value in front of it
    for ($i = $index; $i < sizeof($todoList); $i++) {
        $todoList[$i] = $todoList[$i + 1];
    }

    // unset the last value because all item is already shifter backward in position
    unset($todoList[sizeof($todoList)]);

    // short-hand of logic above is using array_splice()
    // array_splice($todoList, $index, 1);

    return true;
}
