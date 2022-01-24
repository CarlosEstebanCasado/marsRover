<?php

namespace App\Models;


class Robot
{
    const NORTH = 'N';
    const SOUTH = 'S';
    const EAST = 'E';
    const WEST = 'O';

    const FORWARD = 'F';
    const RIGHT = 'R';
    const LEFT = 'L';

    private $direction;
    private $coordinateX;
    private $coordinateY;

    public function __construct(string $direction, int $coordinateX, int $coordinateY)
    {
        $this->direction = $direction;
        $this->coordinateX = $coordinateX;
        $this->coordinateY = $coordinateY;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction)
    {
        $this->direction = $direction;
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

    public function moveForward()
    {
        if ($this->direction == self::NORTH) {
            $this->coordinateY -= 1;
        }
        if ($this->direction == self::SOUTH) {
            $this->coordinateY += 1;
        }
        if ($this->direction == self::EAST) {
            $this->coordinateX += 1;
        }
        if ($this->direction == self::WEST) {
            $this->coordinateX -= 1;
        }
    }

    public function moveRight()
    {
        if ($this->direction == self::NORTH) {
            $this->coordinateX += 1;
        }
        if ($this->direction == self::SOUTH) {
            $this->coordinateX -= 1;
        }
        if ($this->direction == self::EAST) {
            $this->coordinateY += 1;
        }
        if ($this->direction == self::WEST) {
            $this->coordinateY -= 1;
        }
    }

    public function moveLeft()
    {
        if ($this->direction == self::NORTH) {
            $this->coordinateX -= 1;
        }
        if ($this->direction == self::SOUTH) {
            $this->coordinateX += 1;
        }
        if ($this->direction == self::EAST) {
            $this->coordinateY -= 1;
        }
        if ($this->direction == self::WEST) {
            $this->coordinateY += 1;
        }
    }

    public function moveToLastPoint($command)
    {
        if ($this->direction == self::NORTH && $command == self::FORWARD) {
            $this->coordinateY += 1;
        }

        if ($this->direction == self::NORTH && $command == self::LEFT) {
            $this->coordinateX += 1;
        }

        if ($this->direction == self::NORTH && $command == self::RIGHT) {
            $this->coordinateX -= 1;
        }


        if ($this->direction == self::SOUTH && $command == self::FORWARD) {
            $this->coordinateY -= 1;
        }

        if ($this->direction == self::SOUTH && $command == self::LEFT) {
            $this->coordinateX -= 1;
        }

        if ($this->direction == self::SOUTH && $command == self::RIGHT) {
            $this->coordinateX += 1;
        }


        if ($this->direction == self::EAST && $command == self::FORWARD) {
            $this->coordinateX -= 1;
        }

        if ($this->direction == self::EAST && $command == self::LEFT) {
            $this->coordinateY += 1;
        }

        if ($this->direction == self::EAST && $command == self::RIGHT) {
            $this->coordinateY -= 1;
        }

        if ($this->direction == self::WEST && $command == self::FORWARD) {
            $this->coordinateX += 1;
        }

        if ($this->direction == self::WEST && $command == self::LEFT) {
            $this->coordinateY -= 1;
        }

        if ($this->direction == self::WEST && $command == self::RIGHT) {
            $this->coordinateY += 1;
        }
    }
}
