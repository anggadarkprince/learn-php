<?php

class Car
{
    public readonly string $serialEngine;
    public readonly string $name;

    public function __construct($serialEngine, $name)
    {
        $this->serialEngine = $serialEngine;
        $this->name = $name;
    }
}

class MotorCycle
{
    public function __construct(
        public readonly string $id,
        public readonly string $engineCapacity
    )
    {
    }
}

$brio = new Car("FDJ34343", "Honda Brio RS");
var_dump($brio->serialEngine . ' ' . $brio->name);
//$brio->name = "Honda Brio Satya"; // error