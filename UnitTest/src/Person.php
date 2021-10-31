<?php

namespace Anggadarkprince\LearnUnitTest;

use Exception;

class Person
{

    public function __construct(private string $name)
    {
    }

    public function sayHello(?string $name)
    {
        if (is_null($name)) {
            throw new Exception("Name is null");
        }

        return "Hello $name, my name is {$this->name}";
    }

    public function sayGoodbye(string $name)
    {
        echo "Goodbye $name" . PHP_EOL;
    }
}