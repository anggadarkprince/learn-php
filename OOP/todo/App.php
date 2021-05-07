<?php

require_once __DIR__ . '/Entities/Todolist.php';
require_once __DIR__ . '/Repositories/TodoListRepositoryImpl.php';
require_once __DIR__ . '/Services/TodolistServiceImpl.php';
require_once __DIR__ . '/Views/TodolistView.php';

use Repositories\TodoListRepositoryImpl;
use Services\TodolistServiceImpl;
use Views\TodoListView;

$todoListRepository = new TodoListRepositoryImpl();
$todoListService = new TodolistServiceImpl($todoListRepository);
$todoListView = new TodoListView($todoListService);

echo "--------------------" . PHP_EOL;
echo "Todolist Application" . PHP_EOL;
echo "--------------------" . PHP_EOL;
$todoListView->showTodolist();