<?php

interface HasBrand {
    public function getBrand(): string;
}

interface HasName {
    public function getName(): string;
}

class BrandProduct implements HasBrand, HasName
{
    public function __construct(
        public string $name,
        public string $brand
    )
    {
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class SimpleProduct implements HasName
{
    public function __construct(
        public string $name
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}

function printProductName(HasBrand & HasName $value) {
    echo $value->getName() . " (" . $value->getBrand() . ")\n";
}

printProductName(new BrandProduct("Brio RS", "Honda"));
//printProductName(new SimpleProduct("Toyota Avanza")); // error