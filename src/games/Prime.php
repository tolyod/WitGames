<?php
namespace BrainGames\Cli\Game\Prime;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

function isPrime($num)
{
    if ($num === 1) {
        return false;
    }
    for ($devider = 2; $devider ** 2 <= $num; $devider++) {
        if ($num % $devider === 0) {
            return false;
        }
    }
    return true;
}

function makeQuestionAndAnswer()
{
    $random = random_int(0, 500);
    $answer = isPrime($random) ? "yes" : "no";
    $question = strval($random);

    return [$question, $answer];
}

function start()
{
    run(
        DESCRIPTIOM,
        "BrainGames\Cli\Game\Prime\makeQuestionAndAnswer"
    );
}
