<?php
namespace BrainGames\Cli\Game;
use function \cli\line;
use function \cli\prompt;

function iter($params)
{
    [$name, $steps, $ns] = $params;

    if ($steps === 0) {
        line("Congratulations, %s !", $name);
        return true;
    }
    $makeQuestion = $ns . "\makeQuestion";
    [$question, $currectAnswer] = $makeQuestion();

    line("Question: %s", $question);
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
    return iter([$name, $steps - 1, $ns]);
}

function run($game)
{
    $ns = __NAMESPACE__ . "\\" . $game;
    $rules = $ns . "\getRules";
    line('Welcome to the Brain Game!');
    line($rules());

    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    return iter([$name, 3, $ns]);
}
