<?php

require_once __DIR__ . "/Models/TodoList.php";
require_once __DIR__ . "/Services/ShowTodoList.php";
require_once __DIR__ . "/Services/AddTodoList.php";
require_once __DIR__ . "/Services/DeleteTodoList.php";
require_once __DIR__ . "/Views/Todo/ShowTodo.php";
require_once __DIR__ . "/Views/Todo/AddTodo.php";
require_once __DIR__ . "/Views/Todo/DeleteTodo.php";
require_once __DIR__ . "/Helpers/Input.php";
require_once __DIR__ . "/Helpers/Output.php";

echo "--------------------" . PHP_EOL;
echo "Todolist Application" . PHP_EOL;
echo "--------------------" . PHP_EOL;

viewShowTodoList();