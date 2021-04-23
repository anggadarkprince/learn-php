<?php

require_once "../../Models/TodoList.php";
require_once "../../Services/TodoService.php";

$todoList[1] = ["todo" => "Write an article", "category" => "No Category"];
$todoList[2] = ["todo" => "Buy a new MacBook", "category" => "No Category"];
$todoList[3] = ["todo" => "Do the home work", "category" => "No Category"];

showTodoList();