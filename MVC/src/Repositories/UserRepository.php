<?php

namespace Anggadarkprince\SimplePhpMvc\Repositories;

use Anggadarkprince\SimplePhpMvc\Models\User;

class UserRepository {

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }

    public function getById(int $id): ?User
    {
        // TODO: Implement getById() method.
    }

    public function getByEmail(string $email): ?User
    {
        return new User("User name", $email, '$2a$12$MhMdF3fIuq1s2GeRdh3PbuPuIcv9G0J1QwQFuPkWinrJF4AfixfoG'); // password: secret
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}