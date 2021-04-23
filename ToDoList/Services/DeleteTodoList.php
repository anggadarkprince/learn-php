<?php

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