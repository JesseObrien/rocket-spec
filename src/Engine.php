<?php namespace Rocket;

use InvalidArgumentException;

class Engine
{
    const VALVE_OPEN = "open";
    const VALVE_CLOSED = "closed";

    private $name;
    private $thrustUnits;
    private $surfaceThrust;
    private $vacuumThrust;

    private $igniter;
    private $propellentValve = self::VALVE_CLOSED;
    private $propellentFlowRate;

    public $thrust;

    public function __construct($name, $thrustUnits, $surfaceThrust, $vacuumThrust)
    {
        $this->name = $name;
        $this->thrustUnits = $thrustUnits;

        if ( ! is_numeric($surfaceThrust))
            throw new InvalidArgumentException("Surface thrust should be expressed as a numeric value. [$surfaceThrust given.]");

        $this->surfaceThrust = $surfaceThrust;

        if ( ! is_numeric($vacuumThrust))
            throw new InvalidArgumentException("Vacuum thrust should be expressed as a numeric value. [$vauumThrust given.]");
        $this->vacuumThrust = $vacuumThrust;

    }

    public function getName()
    {
        return $this->name;
    }

    public function ignite()
    {
        return false;
    }

    public function hasIgnition()
    {
        return $this->ignition;
    }

    public function openPropellentValve()
    {

        return $this->propellentValve = self::VALVE_OPEN;
    }

    public function closePropellentValve()
    {
        return $this->propellentValve = self::VALVE_CLOSED;
    }

    public function setPropellentFlowRate($percentage)
    {
        if ($percentage > 1 or $percentage < 0)
            throw new InvalidArgumentException("Propellent flow rate must be a value between 0 and 1, eg: 0.65. [$percentage given]");

        $this->propellentFlowRate = $percentage;
    }

    public function getPropellentFlowRate()
    {
        return $this->propellentFlowRate;
    }

    public function getThrustUnits()
    {
        return $this->thrustUnits;
    }

    public function getSurfaceThrust()
    {
        return $this->surfaceThrust;
    }

    public function getVacuumThrust()
    {
        return $this->vacuumThrust;
    }

    public function getSurfaceThrustInUnits()
    {
        return $this->surfaceThrust.$this->getThrustUnits();
    }

    public function getVacuumThrustInUnits()
    {
        return $this->vacuumThrust.$this->getThrustUnits();
    }
}
