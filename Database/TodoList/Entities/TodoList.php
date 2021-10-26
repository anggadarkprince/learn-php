<?php

namespace TodoList\Entities;

require_once __DIR__ . '/Entity.php';

class TodoList extends Entity
{
    protected string $table = 'todolists';

    private int $id;
    private string $todo;

    public function __construct(int $id, string $todo)
    {
        $this->id = $id;
        $this->todo = $todo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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