<?php

require_once __DIR__ . "/../Entities/Todolist.php";
require_once __DIR__ . "/../Repositories/TodoListRepositoryImpl.php";
require_once __DIR__ . "/../Services/TodolistServiceImpl.php";

use Entities\TodoList;
use Repositories\TodoListRepositoryImpl;
use Services\TodolistServiceImpl;

function testShowTodoList(): void
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todolistRepository->todolist[1] = new TodoList("Learn PHP");
    $todolistRepository->todolist[2] = new Todolist("Learn PHP OOP");
    $todolistRepository->todolist[3] = new Todolist("Learn PHP Database");

    $todoListService = new TodolistServiceImpl($todolistRepository);

    $todoListService->showTodolist();
}

function testEmptyShowTodoList(): void
{
    $todolistRepository = new TodoListRepositoryImpl();
    $todoListService = new TodolistServiceImpl($todolistRepository);

    $todoListService->showTodolist();
}

function testAddTodoList(): void
{
    $todolistRepository = new TodolistRepositoryImpl();

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Learn PHP");
    $todolistService->addTodolist("Learn PHP OOP");
    $todolistService->addTodolist("Learn PHP Database");

    $todolistService->showTodolist();
}

function testRemoveTodoList(): void
{
    $todolistRepository = new TodolistRepositoryImpl();

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

testRemoveTodoList();