<?php

namespace Repositories;

require_once __DIR__ . "/../Repositories/TodoListRepository.php";;
require_once __DIR__ . "/../Entities/Todolist.php";;

use Entities\TodoList;

class TodoListRepositoryImpl implements TodoListRepository
{
    public array $todolist = array();

    public function save(TodoList $todo): void
    {
        $index = sizeof($this->todolist) + 1;
        $this->todolist[$index] = $todo;
    }

    public function delete(int $index): bool
    {
        if ($index > sizeof($this->todolist) || $index < 1) {
            return false;
        }

        for ($i = $index; $i < sizeof($this->todolist); $i++) {
            $this->todolist[$i] = $this->todolist[$i + 1];
        }

        unset($this->todolist[sizeof($this->todolist)]);

        return true;
    }

    public function findAll(): array
    {
        return $this->todolist;
    }
}