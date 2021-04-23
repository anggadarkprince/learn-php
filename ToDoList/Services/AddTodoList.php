<?php

/**
 * Add new todo list item.
 *
 * @param string $todo
 */
function addTodoList(string $todo): void
{
    global $todoList;

    // using index as number so we start from 1 rather than 0
    $index = sizeof($todoList) + 1;

    $todoList[$index] = $todo;
}