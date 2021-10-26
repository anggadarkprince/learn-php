<?php

namespace TodoList\Repositories;

require_once __DIR__ . "/../Repositories/TodoListRepository.php";;
require_once __DIR__ . "/../Entities/Todolist.php";;

use TodoList\Entities\TodoList;
use PDO;

class TodoListRepositoryImpl implements TodoListRepository
{
    public array $todolist = array();

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(TodoList $todo): void
    {
        $sql = "INSERT INTO todolists(todo) VALUES(?)";

        $statement = $this->connection->prepare($sql);

        $statement->execute([$todo->getTodo()]);
    }

    public function delete(int $id): bool
    {
        $sql = "SELECT * FROM todolists WHERE id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        if ($statement->fetch()) {
            $sql = "DELETE FROM todolists WHERE id = ?";

            $statement = $this->connection->prepare($sql);

            return $statement->execute([$id]);
        }

        return false;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM todolists";

        $statement = $this->connection->query($sql);

        $this->todolist = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->todolist, new TodoList($row['id'], $row['todo']));
        }

        return $this->todolist;
    }
}