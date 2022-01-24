<?php

namespace Tests\Feature;

use App\Models\Planet;
use App\Models\Robot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class httpRequestCommandsTest extends TestCase
{
    const COMMANDS = ['f','r', 'l'];
    /**
     *
     * @return void
     */
    public function testSendCommands()
    {
        $robot = new Robot(
            httpRequestCoordinatesAndDirectionTest::DIRECTIONS[rand(0,3)],
            rand(0,httpRequestCoordinatesAndDirectionTest::MAX_PLANET_POSITION),
            rand(0,httpRequestCoordinatesAndDirectionTest::MAX_PLANET_POSITION)
        );
        $planet = new Planet($robot);
        
        session(['planet' => $planet]);

        $response = $this->post('/commands', [
            'commands' => 'ffrrfffr'
        ]);

        $response->assertStatus(200);
    }

    public function testSendIncorrectCommands()
    {
        $robot = new Robot(
            httpRequestCoordinatesAndDirectionTest::DIRECTIONS[rand(0,3)],
            rand(0,httpRequestCoordinatesAndDirectionTest::MAX_PLANET_POSITION),
            rand(0,httpRequestCoordinatesAndDirectionTest::MAX_PLANET_POSITION)
        );
        $planet = new Planet($robot);

        session(['planet' => $planet]);

        $response = $this->post('/commands', [
            'commands' => 'jhujhu'
        ]);
        
        $response->assertStatus(302);
    }
}
