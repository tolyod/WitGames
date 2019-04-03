<?php
namespace BrainGames\Cli\Game\BrainProgression;
use function BrainGames\Cli\Game\run;

function makeQuestion()
{
    $start = random_int(1, 10);
    $end = $start + 100;
    $multiplier = random_int(1, 10);
    $range = array_slice(
        range($start, $end, $multiplier),
        0,
        10
    );
    $index = array_rand($range, 1);
    $answer = strval($range[$index]);
    $range[$index] = "..";
    $question = implode(" ", $range);

    return [$question, $answer];
}

function getRules()
{
    return "What number is missing in the progression?\n";
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game);
}
