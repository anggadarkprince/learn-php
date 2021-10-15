<?php

class Manager
{
    private function test(): void
    {

    }
}

class VicePresident extends Manager
{

    public function test(string $name): string // allowed to define a public function with same name
    {
        return "VP";
    }

}