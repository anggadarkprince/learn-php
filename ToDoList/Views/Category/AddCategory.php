<?php

require_once __DIR__ . "/../../Models/Category.php";
require_once __DIR__ . "/../../Helpers/Input.php";
require_once __DIR__ . "/../../Helpers/Output.php";
require_once __DIR__ . "/../../Services/CategoryService.php";

function viewAddCategory()
{
    echo "ADD CATEGORY" . PHP_EOL;

    $category = input("Category (type 'x' to cancel)");

    if (strtolower($category) == "x") {
        output("Cancel to add category", "i") . PHP_EOL;
    } else {
        addCategory($category);
    }
}