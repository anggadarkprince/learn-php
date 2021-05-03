<?php

class Student
{
    public string $id;
    public string $name;
    public string $value;
    private string $sample;

    public function setSample(string $val)
    {
        $this->sample = $val;
    }

    public function getSample()
    {
        return $this->sample;
    }

    // default function will execute after object cloned
    // we can modify or delete data after clone
    public function __clone()
    {
        unset($this->value);
        unset($this->sample);
    }
}