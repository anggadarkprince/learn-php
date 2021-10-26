<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entities/Todolist.php';
require_once __DIR__ . '/../Repositories/TodoListRepositoryImpl.php';
require_once __DIR__ . '/../Services/TodolistServiceImpl.php';
require_once __DIR__ . '/../Views/TodolistView.php';

use TodoList\Config\Database;
use TodoList\Repositories\TodoListRepositoryImpl;
use TodoList\Services\TodolistServiceImpl;
use TodoList\Views\TodoListView;

function testViewShowTodoList(): void
{
    $connection = Database::getConnection();
    $todoListRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodolist("Learn PHP");
    $todoListService->addTodolist("Learn PHP OOP");
    $todoListService->addTodolist("Learn PHP Database");

    $todoListView->showTodolist();
}


function testViewAddTodoList(): void
{
    $connection = Database::getConnection();
    $todoListRepository = new TodolistRepositoryImpl($connection);
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    $todoListService->addTodolist("Learn PHP");
    $todoListService->addTodolist("Learn PHP OOP");
    $todoListService->addTodolist("Learn PHP Database");
    $todoListService->showTodolist();

    $todoListView->addTodolist();
    $todoListService->showTodolist();

    $todoListView->addTodolist();
    $todoListService->showTodolist();
}

function testViewDeleteTodolist(): void
{
    $connection = Database::getConnection();
    $todoListRepository = new TodolistRepositoryImpl($connection);
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    $todoListService->addTodolist("Learn PHP");
    $todoListService->addTodolist("Learn PHP OOP");
    $todoListService->addTodolist("Learn PHP Database");
    $todoListService->showTodolist();

    $todoListView->deleteTodoList();
    $todoListService->showTodolist();

    $todoListView->deleteTodoList();
    $todoListService->showTodolist();

}

testViewDeleteTodolist();