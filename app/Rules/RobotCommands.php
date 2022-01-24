<?php

namespace App\Rules;

use App\Models\Robot;
use Illuminate\Contracts\Validation\Rule;

class RobotCommands implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $commands = str_split(strtoupper($value));

        foreach ($commands as $command) {
        
            if (strtoupper($command) != Robot::FORWARD && 
                strtoupper($command) != Robot::LEFT && 
                strtoupper($command) != Robot::RIGHT) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The commands are not correct. Use only F (forward), L (left) and R (right)';
    }
}
