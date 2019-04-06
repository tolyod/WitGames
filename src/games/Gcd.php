<?php
namespace BrainGames\games\Gcd;
use function BrainGames\Game\run;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function findGcd($a, $b)
{
    return ($a % $b) ? findGcd($b, $a % $b) : $b;
}

function start()
{
    $makeQuestionAndAnswer = function () {
        $rand1 = random_int(1, 99);
        $rand2 = random_int(1, 99);
        $question = "$rand1 $rand2";
        $answer = strval(findGcd($rand1, $rand2));
        return [$question, $answer];
    };

    run(DESCRIPTION, $makeQuestionAndAnswer);
}
