<?php

class Data implements IteratorAggregate
{
    var string $first = "First";
    public string $second = "Second";
    private string $third = "Third";
    protected string $forth = "Forth";

//    public function getIterator()
//    {
//        $array = [
//            "first" => $this->first,
//            "second" => $this->second,
//            "third" => $this->third,
//            "forth" => $this->forth,
//        ];
//
//        return new ArrayIterator($array);
//    }

    // get iterator with generator
    public function getIterator()
    {
        yield "first" => $this->first;
        yield "second" => $this->second;
        yield "third" => $this->third;
        yield "forth" => $this->forth;
    }
}

$data = new Data();

foreach ($data as $property => $value) {
    echo "$property : $value" . PHP_EOL;
}

// same as above
try {
    foreach ($data->getIterator() as $property => $value) {
        echo "$property : $value" . PHP_EOL;
    }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
