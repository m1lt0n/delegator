<?php

namespace Delegator;

/**
 * The DelegatorInterface needs to be implemented by classes that want to
 * delegate to other objects (e.g. using the DelegatorTrait).
 */
interface DelegatorInterface
{
    /**
     * Can be used as a value in the mappings if we want to delegate all
     * methods to a delegate.
     */
    const ANY = 'any';

    /**
     * Return an associative array (mapping) from objects to methods.
     *
     * Example:
     *
     * If the delegateMap returns [ 'person' => ['name', 'age'] ]
     * the method name() will be delegated to the object's person property.
     *
     * A special case is to use static::ANY instead of an array of method
     * names, and any method will be delegated to the specific object.
     * Since this is a catch all functionality, it's better to be
     * placed last in the delegate map array.
     *
     * @return array the mapping of delegates to methods
     */
    public function delegateMap();
}
