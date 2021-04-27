<?php

namespace Data;

interface HasBrand
{
    function getBrand(): string;
}

interface IsMaintenance
{
    function isMaintenance(): bool;
}

interface HasSerialNumber
{
    function getSerialNumber(): string;
}

// interface can extend another (or multiple) interface, but cannot extends class
interface Car extends HasBrand, IsMaintenance
{
    public function drive(): void;

    public function getTire(): int;
}

class Mazda implements Car, HasSerialNumber
{

    public function drive(): void
    {
        echo "Drive mazda car";
    }

    public function getTire(): int
    {
        return 4;
    }

    function getBrand(): string
    {
        return 'Mazda';
    }

    function isMaintenance(): bool
    {
        return false;
    }

    function getSerialNumber(): string
    {
        return '423-2352AS';
    }
}