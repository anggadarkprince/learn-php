<?php

namespace Entities;

require_once __DIR__ . '/Entity.php';

class Category extends Entity
{
    private string $category;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

}