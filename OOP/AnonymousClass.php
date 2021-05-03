<?php

interface HelloWorld
{
    function sayHello(): void;
}

// without implementation class we create directly without name
$helloWorld = new class("Angga") implements HelloWorld {

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function sayHello(): void
    {
        echo "Hello $this->name" . PHP_EOL;
    }
};
$helloWorld->sayHello();
