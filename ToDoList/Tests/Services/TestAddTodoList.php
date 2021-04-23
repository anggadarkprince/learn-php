<?php

require_once "../../Models/TodoList.php";
require_once "../../Services/AddTodoList.php";

addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");

var_dump($todoList);