<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnitMainPageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetMainPage()
    {
        $this->get('/')->assertSee('Mars Rover Mission');
    }
}
