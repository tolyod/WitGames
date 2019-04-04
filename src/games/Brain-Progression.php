<?php
namespace BrainGames\Cli\Game\BrainProgression;
use function BrainGames\Cli\Game\run;

const RULES = "What number is missing in the progression?\n";

function makeQuestionAndAnswer()
{
    $progressionStart = random_int(1, 100);
    $progressionStep = random_int(1, 10);
    $progressionLength = 10;
    $sequenceEndValue = $progressionStart + (($progressionLength - 1) * $progressionStep);
    $sequence = range(
        $progressionStart,
        $sequenceEndValue,
        $progressionStep
    );

    $indexOfQuestionItem = array_rand($sequence, 1);
    $answer = strval($sequence[$indexOfQuestionItem]);
    $sequence[$indexOfQuestionItem] = "..";
    $question = implode(" ", $sequence);

    return [$question, $answer];
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game);
}
