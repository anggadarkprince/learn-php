<?php

namespace Data;

class Shape
{
    public function getCorner(): int
    {
        return -1;
    }
}

class Rectangle extends Shape
{
    public function getCorner(): int
    {
        return parent::getCorner();
    }

    public function getParentCorner()
    {
        return parent::getCorner();
    }
}