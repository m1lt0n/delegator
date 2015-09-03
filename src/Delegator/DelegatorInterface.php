<?php

namespace Delegator;

/**
 * The DelegatorInterface needs to be implemented by classes that want to
 * delegate to other objects (e.g. using the DelegatorTrait).
 */
interface DelegatorInterface
{
    /**
     * Return an associative array (mapping) from objects to methods.
     *
     * Example:
     *
     * If the delegateMap returns [ 'person' => ['name', 'age'] ]
     * the method name() will be delegated to the object's person property.
     *
     * @return array the mapping of delegates to methods
     */
    public function delegateMap();
}
