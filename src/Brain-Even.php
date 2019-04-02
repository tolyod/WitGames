<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function isEven($num)
{
    return ($num % 2 === 0);
}

function nextStep($name, $steps)
{
    if ($steps === 0) {
        line("Congratulations, %s !", $name);
        return true;
    }

    $question = random_int(1, 99);
    $currectAnswer = isEven($question) ? "yes" : "no";

    line("Question: %d", $question);
    $userAnswer = prompt('Your answer');
    $isAnswerCurrect = ($currectAnswer === $userAnswer);

    if (!$isAnswerCurrect) {
        line(
            "'%s' is wrong answer ;(. Correct answer was '%s'.",
            $userAnswer,
            $currectAnswer
        );
        line("Let's try again, %s!", $name);
        return false;
    }

    line("Correct!");
    return nextStep($name, $steps - 1);
}

function runBrainEven()
{
    line('Welcome to the Brain Game!');
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");

    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);
    return nextStep($name, 3);
}
