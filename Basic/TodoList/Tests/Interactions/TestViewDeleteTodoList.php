<?php

require_once "../../Models/TodoList.php";
require_once "../../Views/Todo/DeleteTodo.php";
require_once "../../Services/TodoService.php";

// add initial data
addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");
showTodoList();

// promp the input and show the result
viewDeleteTodoList();
showTodoList();