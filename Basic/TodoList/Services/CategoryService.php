<?php

require_once __DIR__ . "/../Helpers/Output.php";

/**
 * Add new category.
 *
 * @param string $category
 */
function addCategory(string $category): void
{
    global $categories;

    // using index as number so we start from 1 rather than 0
    $index = sizeof($categories) + 1;

    $categories[$index] = $category;
}

/**
 * Show categories to console.
 */
function showCategories()
{
    global $categories;

    echo "CATEGORIES" . PHP_EOL;

    foreach ($categories as $index => $category) {
        echo " $index. $category" . PHP_EOL;
    }

    if (empty($categories)) {
        output(" Category is empty", "w");
    }
}

/**
 * Delete category by index or it's order number.
 *
 * @param int $index
 * @return bool
 */
function deleteCategory(int $index): bool
{
    global $categories;

    // return false if index out of range
    if ($index > sizeof($categories) || $index < 1) {
        return false;
    }

    // loop through the list and shift value in front of it
    for ($i = $index; $i < sizeof($categories); $i++) {
        $categories[$i] = $categories[$i + 1];
    }

    // unset the last value because all item is already shifter backward in position
    unset($categories[sizeof($categories)]);

    // short-hand of logic above is using array_splice()
    // array_splice($todoList, $index, 1);

    return true;
}

/**
 * Get category by index or it's order number.
 *
 * @param int $index
 * @return string
 */
function getCategory(int $index): string
{
    global $categories;

    // return false if index out of range
    if ($index > sizeof($categories) || $index < 1) {
        return 'No Category';
    }

    return $categories[$index];
}