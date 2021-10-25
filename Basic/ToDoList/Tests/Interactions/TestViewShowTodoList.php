<?php

require_once "../../Views/Todo/ShowTodo.php";
require_once "../../Services/TodoService.php";

// add initial data
addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");
viewShowTodoList();