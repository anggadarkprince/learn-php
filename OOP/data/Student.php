<?php

class Student
{
    public string $id;
    public string $name;
    public string $value;
    private string $sample;

    public function __construct($id = '', $name = '')
    {
        $this->id = $id;
        $this->name = $name;
    }

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

    public function __invoke(...$arguments): void
    {
        $join = join(",", $arguments);
        echo "Invoke student with arguments $join" . PHP_EOL;
    }

    public function __toString(): string
    {
        return "{$this->id}: {$this->name}";
    }

    public function __debugInfo()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "value" => $this->value,
            "sample" => $this->sample,
            "author" => "Angga",
            "version" => "1.0.0"
        ];
    }

    function __destruct()
    {
        echo "Object student $this->name is destroyed" . PHP_EOL;
    }
}