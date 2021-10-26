<?php

namespace Repositories;

use Entities\Category;

interface CategoryRepository
{
    public function save(Category $category): void;

    public function delete(int $index): bool;

    public function findAll(): array;
}