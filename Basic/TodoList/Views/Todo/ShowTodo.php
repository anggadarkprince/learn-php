<?php

require_once __DIR__ . "/../../Models/TodoList.php";
require_once __DIR__ . "/../../Services/TodoService.php";
require_once __DIR__ . "/../../Views/Todo/AddTodo.php";
require_once __DIR__ . "/../../Views/Todo/DeleteTodo.php";
require_once __DIR__ . "/../../Views/Category/ShowCategory.php";
require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";

function viewShowTodoList()
{
    while (true) {
        echo PHP_EOL;
        showTodoList();
        echo PHP_EOL;

        output("MENU", "s");
        echo " 0. Manage Categories" . PHP_EOL;
        echo " 1. Add Todo" . PHP_EOL;
        echo " 2. Delete Todo" . PHP_EOL;
        echo " x. Exit" . PHP_EOL;

        $choice = input("Choice");
        if ($choice == "0") {
            viewShowCategory();
            break;
        } else if ($choice == "1") {
            viewAddTodoList();
        } else if ($choice == "2") {
            viewDeleteTodoList();
        } else if ($choice == "x") {
            echo "Good Bye!";
            break;
        } else {
            output("Unknown parameter, input 0 - 2 or x", "e");
        }
    }
}