<?php

namespace Examples;

class Address
{
    protected $street;
    protected $number;
    protected $city;

    public function __construct($street, $number, $city)
    {
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
    }

    public function fullAddress()
    {
        return "{$this->number}, {$this->street}, {$this->city}";
    }
}
