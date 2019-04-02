<?php
namespace BrainGames\Cli\Game\BrainEven;

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
