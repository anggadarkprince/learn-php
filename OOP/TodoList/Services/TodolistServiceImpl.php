<?php

namespace Services;

require_once __DIR__ . "/../Services/TodoListService.php";;
require_once __DIR__ . "/../Helpers/OutputHelper.php";;

use Entities\TodoList;
use Helpers\OutputHelper;
use Repositories\TodoListRepository;

class TodolistServiceImpl implements TodoListService
{
    private TodoListRepository $todoListRepository;

    public function __construct(TodoListRepository $todoListRepository)
    {
        $this->todoListRepository = $todoListRepository;
    }

    public function showTodoList(): void
    {
        echo "TODO LIST:" . PHP_EOL;
        $todoList = $this->todoListRepository->findAll();
        foreach ($todoList as $index => $value) {
            echo "{$index}. " . $value->getTodo() . PHP_EOL;
        }
        if (empty($todoList)) {
            OutputHelper::output("Todo is empty", "w");
        }
    }

    public function addTodoList(string $todo): void
    {
        $todolist = new TodoList($todo);
        $this->todoListRepository->save($todolist);
        OutputHelper::output("Todo successfully added", "w");
    }

    public function deleteTodoList(int $index): void
    {
        if ($this->todoListRepository->delete($index)) {
            OutputHelper::output("Todo successfully deleted", "w");
        } else {
            OutputHelper::output("Delete todo failed", "e");
        }
    }
}