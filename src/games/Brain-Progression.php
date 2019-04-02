<?php
namespace BrainGames\Cli\Game\BrainProgression;

function makeQuestion()
{
    $rangeStart = random_int(1, 10);
    $rangeEnd = $rangeStart + 100;
    $mult = random_int(1, 10);
    $range = array_slice(
        range($rangeStart, $rangeEnd, $mult),
        0,
        10
    );
    $ind = random_int(1, 10);
    $answer = $range[$ind];
    $range[$ind] = "..";
    $question = implode(" ", $range);

    return [$question, strval($answer)];
}

function getRules()
{
    return "What number is missing in the progression?\n";
}
