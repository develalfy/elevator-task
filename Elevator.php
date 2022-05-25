<?php
namespace Elevator;

class Elevator
{
    protected int $stops = 0;
    protected int $countableFloors = 0;

    /**
     * @param array $floors
     * @return void
     */
    public function elevate(array $floors): void
    {
        $elevates = array_chunk($floors, 2);

        foreach ($elevates as $elevate) {
            $this->countableFloors = $this->makeSingleElevation($elevate, $this->countableFloors);
        }

        $this->countStops($elevates, $this->countableFloors);
    }

    /**
     * @param array $elevates
     * @param int $countableFloors
     * @return void
     */
    private function countStops(array $elevates, int $countableFloors): void
    {
        $this->stops += count($elevates) + $countableFloors;
    }

    /**
     * @return int
     */
    public function getStops(): int
    {
        return $this->stops;
    }

    /**
     * @param $elevate
     * @param int $countableFloors
     * @return int
     */
    private function makeSingleElevation($elevate, int $countableFloors): int
    {
        if (1 !== count($elevate)) {
            $countableFloors += $elevate[0]->getNumber() === $elevate[1]->getNumber() ? 1 : 2;
        } else {
            ++$countableFloors;
        }

        return $countableFloors;
    }
}