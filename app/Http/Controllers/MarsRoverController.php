<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Models\Robot;
use App\Rules\RobotCommands;
use Exception;
use Illuminate\Http\Request;

class MarsRoverController extends Controller
{
    /**
     * 
     */
    public function startingPoint()
    {
        return view('home', [
            'directions' => [
                Robot::NORTH,
                Robot::SOUTH,
                Robot::EAST,
                Robot::WEST,
            ]
        ]);
    }

    public function setUpRobot(Request $request)
    {
        $request->validate([
            'direction' => 'required',
            'coordinatex' => 'required|integer|min:0|max:200',
            'coordinatey' => 'required|integer|min:0|max:200'
        ]);

        try {
            $robot = new Robot(
                $request->input('direction'), 
                $request->input('coordinatex'),
                $request->input('coordinatey')
            );
    
            $planet = new Planet($robot);
            session(['planet' => $planet]);
    
            return view('setup', ['planet' => $planet]);

        } catch (Exception $e) {
            return $e;
        }
    }

    public function recoverSetUpRobot()
    {
        return view('setup', ['planet' => session('planet')]);
    }

    public function giveCommandsToRover(Request $request)
    {
        $request->validate([
            'commands' => ['required', new RobotCommands]
        ]);

        try {
            $commands = $request->input('commands');
            $planet = session('planet');
            
            $movements = $planet->robotMovement($commands);

            session('planet', $planet);

            return view('commands', [
                'planet'    => $planet,
                'movements' => $movements,
                'commands'  => $commands
            ]);
        } catch (Exception $e) {
            return $e;
        }
    }
}
