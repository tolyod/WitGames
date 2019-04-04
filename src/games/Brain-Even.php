<?php
namespace BrainGames\Cli\Game\BrainEven;
use function BrainGames\Cli\Game\run;

const RULES = "Answer \"yes\" if number even otherwise answer \"no\".\n";

function isEven($num)
{
    return ($num % 2 === 0);
}

function makeQuestionAndAnswer()
{
    $question = random_int(1, 99);
    $answer = isEven($question) ? "yes" : "no";
    return [$question, $answer];
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game);
}
