<?php

namespace App\Models;

class Obstacle
{

    private $coordinateX;
    private $coordinateY;

    public function __construct(int $coordinateX, int $coordinateY)
    {
        $this->coordinateX = $coordinateX;
        $this->coordinateY = $coordinateY;
    }

    public function getCoordinateX(): int
    {
        return $this->coordinateX;
    }

    public function setCoordinateX(int $coordinateX)
    {
        $this->coordinateX = $coordinateX;
    }

    public function getCoordinateY(): int
    {
        return $this->coordinateY;
    }

    public function setCoordinateY(int $coordinateY)
    {
        $this->coordinateY = $coordinateY;
    }
}
