<?php
namespace BrainGames\Cli\Game\Progression;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function makeProgressionSequence()
{
    $start = random_int(1, 100);
    $step = random_int(1, 10);
    $sequenceEndValue = $start + ((PROGRESSION_LENGTH - 1) * $step);
    $sequence = range(
        $start,
        $sequenceEndValue,
        $step
    );
    return $sequence;
}

function start()
{
    $makeQuestionAndAnswer = function () {
        $sequence = makeProgressionSequence();
        $indexOfQuestionItem = array_rand($sequence);
        $answer = strval($sequence[$indexOfQuestionItem]);
        $sequence[$indexOfQuestionItem] = "..";
        $question = implode(" ", $sequence);

        return [$question, $answer];
    };

    run(
        DESCRIPTIOM,
        $makeQuestionAndAnswer
    );
}
