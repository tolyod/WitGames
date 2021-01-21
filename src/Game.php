<?php

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function run($description, $makeQuestionAndAnswer)
{
    line('Welcome to the Brain Game!');
    line("%s \n", $description);
    $userName = prompt('May I have your name?');
    line("Hello, %s!\n", $userName);

    $iter = function ($leftRounds) use (&$iter, $userName, $makeQuestionAndAnswer) {
        [$question, $currectAnswer] = $makeQuestionAndAnswer();
        if ($leftRounds === 0) {
            line("Congratulations, %s !", $userName);
            return;
        }

        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($currectAnswer !== $userAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $userAnswer,
                $currectAnswer
            );
            line("Let's try again, %s!", $userName);
            return;
        }

        line("Correct!");
        $iter($leftRounds - 1);
    };

    $iter(NUMBER_OF_ROUNDS);
}
