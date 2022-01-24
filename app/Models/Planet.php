<?php

namespace App\Models;

class Planet
{
    const NUM_MAX_OBSTACLES = 500;
    const NUM_MIN_OBSTACLES = 200;

    private int $size = 200;
    private array $obstacles;
    private Robot $robot;

    public function __construct(Robot $robot, ?array $obstacles = null)
    {
        $this->robot = $robot;

        if ($obstacles === null) {
            $this->generateObstacles($robot);
        } else {
            $this->obstacles = $obstacles;
        }

    }

    public function getSize(): int
    {
        return $this->size;
    } 

    public function getObstacles(): array
    {
        return $this->obstacles;
    }

    public function getRobot(): Robot
    {
        return $this->robot;
    }

    public function setRobot(Robot $robot)
    {
        $this->robot = $robot;
    }

    private function generateObstacles($robot)
    {
        $numberOfObstacles = rand(self::NUM_MIN_OBSTACLES,self::NUM_MAX_OBSTACLES);
        
        for ($i=0; $i < $numberOfObstacles ; $i++) { 
            
            $obstacle = new Obstacle(rand(0, $this->size), rand(0, $this->size));

            if ($obstacle->getCoordinateX() != $robot->getCoordinateX() || $obstacle->getCoordinateY() != $robot->getCoordinateY()) {
                $this->obstacles[] = $obstacle;
            }
        }

    }

    private function checkCollision($command)
    {
        $obstaclesDetected = 0;
        
        foreach ($this->getObstacles() as $obstacle) {
            if ($obstacle->getCoordinateX() === $this->getRobot()->getCoordinateX() &&
                $obstacle->getCoordinateY() === $this->getRobot()->getCoordinateY()) {
                $this->getRobot()->moveToLastPoint($command);

                return "Warning! An obstacle has been encountered. Robot stays at position X: " . 
                $this->getRobot()->getCoordinateX() . ", Y: " . $this->getRobot()->getCoordinateY();
            } 
            
            if ($this->isAtThePlanetLimit()) {
                $this->getRobot()->moveToLastPoint($command);
                return "Ops! It seems we have arrived at the limits of this planet. Robot stays at position X: " . 
                $this->getRobot()->getCoordinateX() . ", Y: " . $this->getRobot()->getCoordinateY();
            }
        }
        return "All clear. Robot moves to X: " . $this->getRobot()->getCoordinateX() . ", Y: " .
         $this->getRobot()->getCoordinateY();
    }

    public function isAtThePlanetLimit()
    {
         return $this->getRobot()->getCoordinateX() > $this->size ||
                $this->getRobot()->getCoordinateX() < 0 ||
                $this->getRobot()->getCoordinateY() > $this->size ||
                $this->getRobot()->getCoordinateY() < 0; 
    }

    public function robotMovement($commands)
    {
        $commandValues = str_split(strtoupper($commands));

        $movements = [];
        foreach ($commandValues as $command) {
            if ($command === Robot::FORWARD) {
                $this->getRobot()->moveForward();
                $movements[] = $this->checkCollision($command);

            } elseif ($command === Robot::RIGHT) {
                $this->getRobot()->moveRight();
                $movements[] = $this->checkCollision($command);

            } elseif ($command === Robot::LEFT) {
                $this->getRobot()->moveLeft();
                $movements[] = $this->checkCollision($command);
            }
        }

        return $movements;
    }
}
