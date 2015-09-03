<?php

namespace Examples;

use Delegator\DelegatorInterface;

class Person implements DelegatorInterface
{
    use \Delegator\DelegatorTrait;

    // Implement the delegateMap method. This is the only requirement
    // of the DelegatorInterface
    public function delegateMap()
    {
        return [
            'address' => [ 'fullAddress' ],
        ];
    }

    public function __construct(Address $address)
    {
        $this->address = $address;
    }
}
