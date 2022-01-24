<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class httpRequestCoordinatesAndDirectionTest extends TestCase
{
    const DIRECTIONS = ['N', 'E', 'O', 'S'];
    const MAX_PLANET_POSITION = 200;

    /**
     *
     * @return void
     */
    public function testPassCorrectCoordinates()
    {
        $this->withExceptionHandling();
        $response = $this->post('/set-up-rover', [
            'coordinatex' => rand(0,self::MAX_PLANET_POSITION),
            'coordinatey' => rand(0,self::MAX_PLANET_POSITION),
            'direction'    => self::DIRECTIONS[rand(0,3)]
        ]);
        
        $response->assertStatus(200);
    }

    /**
     * 
     * @return void
     */
    public function testPassIncorrectCoordinates()
    {
        $this->withExceptionHandling();
        $response = $this->post('/set-up-rover', [
            'coordinatex' => rand(self::MAX_PLANET_POSITION, 800),
            'coordinatey' => rand(self::MAX_PLANET_POSITION, 800),
            'direction'    => self::DIRECTIONS[rand(0,3)]
        ]);
        
        $response->assertStatus(302);
    }
}
