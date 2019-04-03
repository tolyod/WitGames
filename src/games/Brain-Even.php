<?php
namespace BrainGames\Cli\Game\BrainEven;
use function BrainGames\Cli\Game\run;

function isEven($num)
{
    return ($num % 2 === 0);
}

function makeQuestion()
{
    $question = random_int(1, 99);
    $answer = isEven($question) ? "yes" : "no";
    return [$question, $answer];
}

function getRules()
{
    return "Answer \"yes\" if number even otherwise answer \"no\".\n";
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game);
}
