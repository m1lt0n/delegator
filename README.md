[![Build Status](https://travis-ci.org/m1lt0n/delegator.svg)](https://travis-ci.org/m1lt0n/delegator)

# Delegator
A simple delegation mechanism for objects.

Delegator is a simple library that allows delegation of methods from an object to others. It can be useful in combination
with implementing Delegators, where one can partly decorate an object and partly delegate to the original, undecorated object.

### Εxample
```php
<?php

use Delegator\DelegatorInterface;

// Assume we have a Person class
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

// Simply by using the DelegatorTrait and implementing the delegateMap method,
// we can now delegate calls to the mapped delegates.
$address = new Address('Percy str.', 9, 'London');
$me = new Person($address);

echo $me->fullAddress();

// this is equivalent to $me->address->fullAddress, but we have simplified
// our API and hide the internals, while ensuring separation of concerns and
// limited responsibility for each class.
```

Note: Several delegates can be assigned in the mapping.