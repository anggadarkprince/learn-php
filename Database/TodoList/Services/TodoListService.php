<?php

namespace TodoList\Services;

interface TodoListService
{
    public function showTodoList(): void;

    public function addTodoList(string $todo): void;

    public function deleteTodoList(int $index):void;
}