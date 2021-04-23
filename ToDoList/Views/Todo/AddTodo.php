<?php

require_once __DIR__ . "/../../Models/TodoList.php";
require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";
require_once __DIR__ . "/../../Services/TodoService.php";

function viewAddTodoList()
{
    echo "ADD TODO" . PHP_EOL;

    $todo = input("Todo (type 'x' to cancel)");

    if (strtolower($todo) == "x") {
        output("Cancel to add todo list item", "i") . PHP_EOL;
    } else {
        showCategories();

        $indexCategory = input("Todo category (type 'x' to set 'No Category')");
        if(empty($indexCategory) || $indexCategory == 'x') {
            $indexCategory = 0;
        }
        $category = getCategory($indexCategory);

        addTodoList($todo, $category);
    }
}