<?php

namespace Data;

abstract class Location {
    private string $name;
}

class City extends Location {
    private string $name;

    public function __construct($city)
    {
        $this->name = $city;
    }

    public function getLocation()
    {
        return $this->name;
    }
}

class Country extends Location {
    private string $name;

    public function __construct($country)
    {
        $this->name = $country;
    }

    public function getLocation()
    {
        return $this->name;
    }
}