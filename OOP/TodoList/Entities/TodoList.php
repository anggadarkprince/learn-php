<?php

namespace Entities;

require_once __DIR__ . '/Entity.php';

class TodoList extends Entity
{
    private string $todo;

    public function __construct(string $todo)
    {
        $this->todo = $todo;
    }

    public function setTodo(string $todo): void
    {
        $this->todo = $todo;
    }

    public function getTodo(): string
    {
        return $this->todo;
    }

}