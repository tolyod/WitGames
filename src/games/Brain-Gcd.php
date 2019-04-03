<?php
namespace BrainGames\Cli\Game\BrainGcd;
use function BrainGames\Cli\Game\run;

function makeQuestion()
{
    $gcd = function ($a, $b) use (&$gcd) {
        return ($a % $b) ? $gcd($b, $a % $b) : $b;
    };

    $rand1 = random_int(1, 99);
    $rand2 = random_int(1, 99);

    $question = sprintf("%d %d", $rand1, $rand2);
    $answer = strval($gcd($rand1, $rand2));
    return [$question, $answer];
}

function getRules()
{
    return "Find the greatest common divisor of given numbers.\n";
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game);
}
