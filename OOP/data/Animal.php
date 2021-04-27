<?php

namespace Data;

abstract class Animal
{
    public string $name;

    // abstract function cannot has body and should inside abstract class as well
    public abstract function run(): void;
}

class Cat extends Animal
{
    // should implement parent abstract function
    public function run(): void
    {
        echo "Cat $this->name is running";
    }
}

class Dog extends Animal
{
    // should implement parent abstract function
    public function run(): void
    {
        echo "Dog $this->name is running";
    }
}