<?php

class Product
{
    private string $serialNumber;
    protected string $name;
    protected int $price;

    public function __construct(string $name, int $price, string $serialNumber = '')
    {
        $this->serialNumber = $serialNumber;
        $this->name = $name;
        $this->price = $price;
    }

    public function getSerial(): string
    {
        return $this->serialNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class Snack extends Product
{
    public function info()
    {
        // private visibility of the parent cannot accessed from the child
        // echo "Serial $this->serialNumber" . PHP_EOL;
        echo "Name $this->name" . PHP_EOL;
        echo "Price $this->price" . PHP_EOL;
    }
}