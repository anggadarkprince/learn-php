<?php

require_once "../../Interactions/Todo/ShowTodo.php";
require_once "../../Services/AddTodoList.php";

// add initial data
addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");
viewShowTodoList();