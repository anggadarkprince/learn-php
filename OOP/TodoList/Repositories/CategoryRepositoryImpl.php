<?php

namespace Repositories;

require_once __DIR__ . "/../Repositories/CategoryRepository.php";;
require_once __DIR__ . "/../Entities/Category.php";;

use Entities\Category;

class CategoryRepositoryImpl implements CategoryRepository
{
    public array $category = array();

    public function save(Category $category): void
    {
        $index = sizeof($this->category) + 1;
        $this->category[$index] = $category;
    }

    public function delete(int $index): bool
    {
        if ($index > sizeof($this->category) || $index < 1) {
            return false;
        }

        for ($i = $index; $i < sizeof($this->category); $i++) {
            $this->category[$i] = $this->category[$i + 1];
        }

        unset($this->category[sizeof($this->category)]);

        return true;
    }

    public function findAll(): array
    {
        return $this->category;
    }
}