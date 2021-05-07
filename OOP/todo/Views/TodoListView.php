<?php

namespace Views;

require_once __DIR__ . '/../Helpers/InputHelper.php';
require_once __DIR__ . '/../Helpers/OutputHelper.php';

use Helpers\InputHelper;
use Helpers\OutputHelper;
use Services\TodoListService;

class TodoListView
{
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    public function showTodoList(): void
    {
        while (true) {
            echo PHP_EOL;
            $this->todoListService->showTodoList();
            echo PHP_EOL;

            OutputHelper::output("MENU", "s");
            echo " 1. Add Todo" . PHP_EOL;
            echo " 2. Delete Todo" . PHP_EOL;
            echo " x. Exit" . PHP_EOL;

            $choice = InputHelper::input("Choice");
            if ($choice == "1") {
                $this->addTodoList();
            } else if ($choice == "2") {
                $this->deleteTodoList();
            } else if ($choice == "x") {
                echo "Good Bye!";
                break;
            } else {
                output("Unknown parameter, input 1 - 2 or x", "e");
            }
        }
    }

    public function addTodoList(): void
    {
        echo "ADD TODO" . PHP_EOL;

        $todo = InputHelper::input("Todo (type 'x' to cancel)");

        if ($todo == "x") {
            echo "Cancel to add todo" . PHP_EOL;
        } else {
            $this->todoListService->addTodolist($todo);
        }
    }

    public function deleteTodoList(): void
    {
        echo "DELETE TODO" . PHP_EOL;

        $choice = InputHelper::input("Order todo number (type 'x' to cancel)");

        if ($choice == "x") {
            echo "Cancel to delete todo" . PHP_EOL;
        } else {
            $this->todoListService->deleteTodoList($choice);
        }
    }
}