<?php

require_once __DIR__ . "/../../Models/Category.php";
require_once __DIR__ . "/../../Services/CategoryService.php";
require_once __DIR__ . "/../../Views/Category/AddCategory.php";
require_once __DIR__ . "/../../Views/Category/DeleteCategory.php";
require_once __DIR__ . "/../../Views/Todo/ShowTodo.php";
require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";

function viewShowCategory()
{
    while (true) {
        echo PHP_EOL;
        showCategories();
        echo PHP_EOL;

        output("CATEGORY MENU", "s");
        echo " 1. Add Category" . PHP_EOL;
        echo " 2. Delete Category" . PHP_EOL;
        echo " x. Back to Todo" . PHP_EOL;

        $choice = input("Choice");
        if ($choice == "1") {
            viewAddCategory();
        } else if ($choice == "2") {
            viewDeleteCategory();
        } else if ($choice == "x") {
            viewShowTodoList();
            break;
        } else {
            output("Unknown parameter, input 1 - 2 or x", "e");
        }
    }
}