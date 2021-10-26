<?php

require_once __DIR__ . '/Config/Database.php';
require_once __DIR__ . '/Entities/Todolist.php';
require_once __DIR__ . '/Repositories/TodoListRepositoryImpl.php';
require_once __DIR__ . '/Services/TodolistServiceImpl.php';
require_once __DIR__ . '/Views/TodolistView.php';

use TodoList\Config\Database;
use TodoList\Repositories\TodoListRepositoryImpl;
use TodoList\Services\TodolistServiceImpl;
use TodoList\Views\TodoListView;

$connection = Database::getConnection();
$todoListRepository = new TodoListRepositoryImpl($connection);
$todoListService = new TodolistServiceImpl($todoListRepository);
$todoListView = new TodoListView($todoListService);

echo "--------------------" . PHP_EOL;
echo "Todolist Application" . PHP_EOL;
echo "--------------------" . PHP_EOL;
$todoListView->showTodolist();