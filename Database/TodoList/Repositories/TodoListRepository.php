<?php

namespace TodoList\Repositories;

use TodoList\Entities\TodoList;

interface TodoListRepository
{
    public function save(TodoList $todo): void;

    public function delete(int $index): bool;

    public function findAll(): array;
}