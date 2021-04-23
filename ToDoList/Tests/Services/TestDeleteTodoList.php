<?php

require_once "../../Models/TodoList.php";
require_once "../../Services/AddTodoList.php";
require_once "../../Services/ShowTodoList.php";
require_once "../../Services/DeleteTodoList.php";

addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");
addTodoList("Drink bunch of coffee");
addTodoList("Deploy a website");
showTodoList();

echo PHP_EOL;

deleteTodoList(2);
showTodoList();

echo PHP_EOL;

$result = deleteTodoList(1);
echo "Delete result: $result" . PHP_EOL;
showTodoList();

echo PHP_EOL;

$result = deleteTodoList(0);
echo "Delete result: $result" . PHP_EOL;

echo PHP_EOL;

$result = deleteTodoList(10);
echo "Delete result: $result" . PHP_EOL;