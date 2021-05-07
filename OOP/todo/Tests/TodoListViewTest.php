<?php

require_once __DIR__ . '/../Entities/Todolist.php';
require_once __DIR__ . '/../Repositories/TodoListRepositoryImpl.php';
require_once __DIR__ . '/../Services/TodolistServiceImpl.php';
require_once __DIR__ . '/../Views/TodolistView.php';

use Repositories\TodoListRepositoryImpl;
use Services\TodolistServiceImpl;
use Views\TodoListView;

function testViewShowTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodolist("Learn PHP");
    $todoListService->addTodolist("Learn PHP OOP");
    $todoListService->addTodolist("Learn PHP Database");

    $todoListView->showTodolist();
}


function testViewAddTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
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
    $todoListRepository = new TodolistRepositoryImpl();
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