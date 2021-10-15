<?php

class ParentClass
{
    public function method(string $name)
    {

    }
}

class ChildClass extends ParentClass
{

    public function method(int $name) // cannot change signature of method param
    {

    }

}