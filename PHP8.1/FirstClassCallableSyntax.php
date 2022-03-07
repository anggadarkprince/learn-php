<?php

class SinglePerson
{
    public function __construct(public string $name)
    {
    }

    public function sayHello($name): string
    {
        return "Hello {$name}, my name is {$this->name}";
    }
}

$user = new SinglePerson("Angga");

$reference = $user->sayHello(...);

var_dump($reference("Ari"));

$strContains = str_contains(...);
var_dump($strContains("Angga", "A"));