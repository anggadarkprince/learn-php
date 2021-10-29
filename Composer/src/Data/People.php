<?php

namespace MyApp\Data;

class People
{
    public function __construct(private string $name)
    {
    }

    public function sayHello(string $name) {
        return "Hello $this->name to $name";
    }

}