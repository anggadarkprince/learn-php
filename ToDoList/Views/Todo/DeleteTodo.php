<?php

require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";
require_once __DIR__ . "/../../Services/DeleteTodoList.php";

function viewRemoveTodoList()
{
    echo "DELETE TODO" . PHP_EOL;

    $choice = input("Order todo number (type 'x' to cancel)");

    if (strtolower($choice) == "x") {
        output("Cancel to delete todo list item", "i") . PHP_EOL;
    } else {
        $result = deleteTodoList($choice);

        if ($result) {
            output("Todo number $choice successfully deleted", "w") . PHP_EOL;
        } else {
            output("Delete todo number $choice failed", "e") . PHP_EOL;
        }
    }
}