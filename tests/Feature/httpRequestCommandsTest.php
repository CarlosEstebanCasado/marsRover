<?php

namespace Tests\Feature;

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
        $response = $this->post('/commands', [
            'commands' => 'ffrrfffr'
        ]);

        $response->assertStatus(200);
    }

    public function testSendIncorrectCommands()
    {
        $response = $this->post('/commands', [
            'commands' => 'jhujhu'
        ]);
        
        $response->assertStatus(302);
    }
}
