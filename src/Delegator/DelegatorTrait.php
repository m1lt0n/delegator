<?php

namespace Delegator;

use Delegator\Exceptions\MethodNotFoundException;

/**
 * The DelegatorTrait makes it easy to implement Classes that their instances
 * delegate some methods to other objects. The only requirement is that the
 * Class implements Delegator\DelegatorInterface for mapping methods to
 * objects.
 */
trait DelegatorTrait
{
    /**
     * Check if the inexistent method is found in a delegate and invoke it
     * there.
     *
     * @param  string $method the method
     * @param  array $args    the arguments passed
     * @return mixed          anything the method will return
     * @throws Delegator\Exceptions\MethodNotFoundException if method is not found
     */
    public function __call($method, $args)
    {
        $match = null;

        foreach ($this->delegateMap() as $delegate => $methods) {
            // if a delegate has any method, immediately match it
            if ($methods === static::ANY) {
                $match = $this->{$delegate};
                break;
            }

            if (in_array($method, $methods)) {
                $match = $this->{$delegate};
                break;   
            }
        }

        try {
            return call_user_func([$match, $method], $args);
        } catch (\Exception $e) {
            throw new MethodNotFoundException();
        }
    }
}
