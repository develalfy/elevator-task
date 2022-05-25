<?php

namespace Elevator\tests;

use Elevator\Elevator;
use Elevator\Floor;
use PHPUnit\Framework\TestCase;

class ElevatorTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->elevator = new Elevator();
    }

    public function testElevateCase1()
    {
        $this->elevator->elevate([new Floor(2), new Floor(3), new Floor(5)]);

        $this->assertEquals(5, $this->elevator->getStops());
    }

    public function testElevateCase2()
    {
        $this->elevator->elevate([new Floor(2), new Floor(2), new Floor(4), new Floor(5), new Floor(6)]);

        $this->assertEquals(7, $this->elevator->getStops());
    }

    public function testElevateCase3()
    {
        $this->elevator->elevate([new Floor(5), new Floor(5), new Floor(5), new Floor(5)]);

        $this->assertEquals(4, $this->elevator->getStops());
    }
}
