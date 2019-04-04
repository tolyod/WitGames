<?php
namespace BrainGames\Cli\Game\Progression;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "What number is missing in the progression?\n";

function makeProgressionSequence()
{
    $start = random_int(1, 100);
    $step = random_int(1, 10);
    $length = 10;
    $sequenceEndValue = $start + (($length - 1) * $step);
    $sequence = range(
        $start,
        $sequenceEndValue,
        $step
    );
    return $sequence;
}

function makeQuestionAndAnswer()
{
    $sequence = makeProgressionSequence();
    $indexOfQuestionItem = array_rand($sequence, 1);
    $answer = strval($sequence[$indexOfQuestionItem]);
    $sequence[$indexOfQuestionItem] = "..";
    $question = implode(" ", $sequence);

    return [$question, $answer];
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game, DESCRIPTIOM);
}
