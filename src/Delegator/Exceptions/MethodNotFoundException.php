<?php

namespace Delegator\Exceptions;

/**
 * A MethodNotFoundException is thrown when the method is not found in the
 * delegates of an object (and ofcourse not in the object itself).
 */
class MethodNotFoundException extends \Exception
{
}
