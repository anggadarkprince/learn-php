<?php

require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";
require_once __DIR__ . "/../../Services/CategoryService.php";

function viewDeleteCategory()
{
    echo "DELETE CATEGORY" . PHP_EOL;

    $choice = input("Order category number (type 'x' to cancel)");

    if (strtolower($choice) == "x") {
        output("Cancel to delete category item", "i") . PHP_EOL;
    } else {
        $result = deleteCategory($choice);

        if ($result) {
            output("Category number $choice successfully deleted", "w") . PHP_EOL;
        } else {
            output("Delete category number $choice failed", "e") . PHP_EOL;
        }
    }
}