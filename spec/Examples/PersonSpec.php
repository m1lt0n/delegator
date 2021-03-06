<?php

namespace spec\Examples;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Examples\Address;
use Examples\Settings;

class PersonSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            new Address('example', 10, 'sample city'),
            new Settings()
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Delegator\DelegatorInterface');
    }

    function it_delegates_full_address()
    {
        $this->fullAddress()->shouldReturn('10, example, sample city');
    }

    function it_delegates_any_method_to_settings()
    {
        $this->all()->shouldReturn('all settings');
        $this->something()->shouldReturn('some setting');
    }

    function it_throws_exception_in_inexistent_method()
    {
        $this->shouldThrow('\Delegator\Exceptions\MethodNotFoundException')
             ->duringInexistent();
    }
}
