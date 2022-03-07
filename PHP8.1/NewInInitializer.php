<?php

class Category
{
    public function __construct(public string $name)
    {
    }
}

class Product
{
    public function __construct(
        public string   $name,
        public Category $category = new Category("Uncategorized")
    )
    {
    }
}

$apple = new Product("Apple");
$banana = new Product("Banana", new Category("Fruit"));
var_dump($apple);
var_dump($banana);