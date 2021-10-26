<?php

class Person
{
    const AUTHOR = "Sketch Project";

    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

    /**
     * Person constructor, called when object instantiated.
     *
     * @param string $name
     * @param string|null $address
     */
    function __construct(string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * Function is procedural instruction of the class.
     * can have parameters and return value.
     *
     * @param string|null $name
     */
    function sayHello(?string $name): void
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

    /**
     * Using keyword self to pointing current class name,
     * different with keyword this, the self keyword cannot call non static of constant variable
     */
    function info()
    {
        echo "Author : " . self::AUTHOR . PHP_EOL;
    }

    /**
     * Executed when object removed from memory
     * No arguments is required
     * Suit to close database connection or stop opened file read streaming
     */
    function __destruct()
    {
        echo "Object person $this->name is destroyed" . PHP_EOL;
    }
}