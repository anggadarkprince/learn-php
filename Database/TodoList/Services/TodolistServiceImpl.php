<?php

namespace TodoList\Services;

require_once __DIR__ . "/../Services/TodoListService.php";;
require_once __DIR__ . "/../Helpers/OutputHelper.php";;

use TodoList\Entities\TodoList;
use TodoList\Helpers\OutputHelper;
use TodoList\Repositories\TodoListRepository;

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
            echo ($index + 1) . ". " . $value->getTodo() . ' - ID: ' . $value->getId() . PHP_EOL;
        }
        if (empty($todoList)) {
            OutputHelper::output("Todo is empty", "w");
        }
    }

    public function addTodoList(string $todo): void
    {
        $todolist = new TodoList(0, $todo);
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