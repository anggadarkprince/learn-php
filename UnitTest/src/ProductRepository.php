<?php

namespace Anggadarkprince\LearnUnitTest;

interface ProductRepository
{
    public function save(Product $product): Product;

    public function delete(Product $product): void;

    public function findById(string $product): ?Product;

    public function findAll(): array;
}