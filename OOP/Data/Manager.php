<?php

class Manager
{
    var string $name;
    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{
    // constructor overriding must call parent constructor
    public function __construct(string $name = "")
    {
        // not required but recommended
        parent::__construct($name, "VP");
    }

    /**
     * Override function from parent.
     *
     * @param string $name
     */
    function sayHello(string $name): void
    {
        //parent::sayHello($name);
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}