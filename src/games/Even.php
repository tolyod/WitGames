<?php
namespace BrainGames\Cli\Game\Even;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "Answer \"yes\" if number even otherwise answer \"no\".\n";

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
    run(
        DESCRIPTIOM,
        "BrainGames\Cli\Game\Even\makeQuestionAndAnswer"
    );
}
