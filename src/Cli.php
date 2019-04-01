<?php

namespace BrainGames\Cli;

use function \cli\line;

class Cli
{
    public static function run()
    {
        line('Welcome to the Brain Game!');
        $name = \cli\prompt('May I have your name?');
        line("Hello, %s!", $name);
    }
}
