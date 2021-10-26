<?php

require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Entities/Todolist.php";
require_once __DIR__ . "/../Repositories/TodoListRepositoryImpl.php";
require_once __DIR__ . "/../Services/TodolistServiceImpl.php";

use TodoList\Config\Database;
use TodoList\Entities\TodoList;
use TodoList\Repositories\TodoListRepositoryImpl;
use TodoList\Services\TodolistServiceImpl;

function testShowTodoList(): void
{
    $connection = Database::getConnection();
    $todolistRepository = new TodoListRepositoryImpl($connection);
    $todolistRepository->todolist[1] = new TodoList(1, "Learn PHP");
    $todolistRepository->todolist[2] = new Todolist(2, "Learn PHP OOP");
    $todolistRepository->todolist[3] = new Todolist(3, "Learn PHP Database");

    $todoListService = new TodolistServiceImpl($todolistRepository);

    $todoListService->showTodolist();
}

function testEmptyShowTodoList(): void
{
    $connection = Database::getConnection();
    $todolistRepository = new TodoListRepositoryImpl($connection);
    $todoListService = new TodolistServiceImpl($todolistRepository);

    $todoListService->showTodolist();
}

function testAddTodoList(): void
{
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Learn PHP");
    $todolistService->addTodolist("Learn PHP OOP");
    $todolistService->addTodolist("Learn PHP Database");

    $todolistService->showTodolist();
}

function testRemoveTodoList(): void
{
    $connection = Database::getConnection();
    $todolistRepository = new TodolistRepositoryImpl($connection);

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Learn PHP");
    $todolistService->addTodolist("Learn PHP OOP");
    $todolistService->addTodolist("Learn PHP Database");

    $todolistService->showTodolist();

    $todolistService->deleteTodoList(1);
    $todolistService->showTodolist();

    $todolistService->deleteTodoList(4);
    $todolistService->showTodolist();

    $todolistService->deleteTodoList(2);
    $todolistService->showTodolist();

    $todolistService->deleteTodoList(1);
    $todolistService->showTodolist();
}

testShowTodoList();