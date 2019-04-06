<?php
namespace BrainGames\Cli\Game\Even;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = 'Answer "yes" if number even otherwise answer "no".';

function isEven($num)
{
    return ($num % 2 === 0);
}

function start()
{
    $makeQuestionAndAnswer = function () {
        $question = random_int(1, 99);
        $answer = isEven($question) ? "yes" : "no";
        return [$question, $answer];
    };

    run(
        DESCRIPTIOM,
        $makeQuestionAndAnswer
    );
}
