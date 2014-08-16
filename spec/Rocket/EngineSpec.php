<?php namespace spec\Rocket;

use Rocket\Engine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EngineSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Merlin 1D',"kN", 720, 650);
    }
   
    function it_is_initializable()
    {
        $this->shouldHaveType('Rocket\Engine');
    }

    function it_has_a_name() 
    {
        $this->getName()->shouldReturn('Merlin 1D');
    }

    function it_can_ignite()
    {
        $this->ignite();
        $this->ignite()->shouldReturn(false);
    }

    function it_can_open_propellent_valve()
    {
        $this->openPropellentValve()->shouldReturn(Engine::VALVE_OPEN);
    }

    function it_can_close_propellent_valve()
    {
        $this->closePropellentValve()->shouldReturn(Engine::VALVE_CLOSED);
    }

    function it_can_have_valve_flow_rate()
    {
        $this->setPropellentFlowRate(0.88);
        $this->getPropellentFlowRate()->shouldReturn(0.88);
    }

    function it_has_thrust_units()
    {
        $this->getThrustUnits()->shouldReturn("kN");
    }

    function it_has_surface_thrust_in_units()
    {
        $this->getSurfaceThrustInUnits()->shouldReturn("720kN");
    }

    function it_has_surface_thrust()
    {
        $this->getSurfaceThrust()->shouldReturn(720);
    }

    function it_has_vacuum_thrust_in_units()
    {
        $this->getVacuumThrustInUnits()->shouldReturn("650kN");
    }

    function it_has_vacuum_thrust()
    {
        $this->getVacuumThrust()->shouldReturn(650);
    }

    function it_should_not_allow_string_surface_value()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array("Name", "kN", "hi", "you"));
    }

    function it_should_not_allow_string_vacuum_value()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array("Name", "kN", "hi", "you"));
    }

}
