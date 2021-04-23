<?php

require_once "../../Interactions/Todo/ShowTodo.php";
require_once "../../Services/ShowTodoList.php";
require_once "../../Services/AddTodoList.php";

// add initial data
addTodoList("Write an article");
addTodoList("Buy a new MacBook");
addTodoList("Do the home work");

// promp the input and show the result
viewAddTodoList();
showTodoList();

// promp the input and show the result
viewAddTodoList();
showTodoList();