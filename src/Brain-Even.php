<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function nextStep($name, $steps = 3)
{
    if ($steps === 0) {
        line("Congratulations, %s !", $name);
        return true;
    }

    $randomNum = random_int(1, 99);
    $isRandomNumEven = ($randomNum % 2 === 0);
    $currectAnswer = $isRandomNumEven ? "yes" : "no";

    line("Question: %d", $randomNum);
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
    return nextStep($name);
}
