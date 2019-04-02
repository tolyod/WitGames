<?php
namespace BrainGames\Cli\Game\BrainGcd;

function makeQuestion()
{
    $gcd = function ($a, $b) use (&$gcd) {
        return ($a % $b) ? $gcd($b, $a % $b) : $b;
    };

    $rand1 = random_int(1, 99);
    $rand2 = random_int(1, 99);

    $question = sprintf("%d %d", $rand1, $rand2);
    $answer = $gcd($rand1, $rand2);
    return [$question, strval($answer)];
}

function getRules()
{
    return "Find the greatest common divisor of given numbers.\n";
}
