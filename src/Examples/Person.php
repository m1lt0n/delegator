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
            'settings' => static::ANY,
        ];
    }

    public function __construct(Address $address, Settings $settings)
    {
        $this->address = $address;
        $this->settings = $settings;
    }
}
