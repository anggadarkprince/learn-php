<?php

namespace Data;

require_once "Food.php";

abstract class Animal
{
    public string $name;

    // abstract function cannot has body and should inside abstract class as well
    public abstract function run(): void;

    abstract public function eat(AnimalFood $animalFood): void;
}

class Cat extends Animal
{
    // should implement parent abstract function
    public function run(): void
    {
        echo "Cat $this->name is running";
    }

    public function eat(AnimalFood $animalFood): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}

class Dog extends Animal
{
    // should implement parent abstract function
    public function run(): void
    {
        echo "Dog $this->name is running";
    }

    /**
     * Contravariance: set parameter or return value to parent.
     *
     * @param Food $animalFood
     */
    public function eat(Food $animalFood): void
    {
        echo "Dog is eating" . PHP_EOL;
    }
}