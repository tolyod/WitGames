<?php
namespace BrainGames\Cli\Game;
use function \cli\line;
use function \cli\prompt;

const NUMBER_OF_ROUNDS = 3;

function run($gameName, $gameRules)
{
    $gameNameSpace = __NAMESPACE__ . "\\" . $gameName;
    $makeQuestionAndAnswer = $gameNameSpace . "\makeQuestionAndAnswer";

    line('Welcome to the Brain Game!');
    line($gameRules);
    $userName = prompt('May I have your name?');

    $iter = function ($leftRounds) use (&$iter, $userName, $makeQuestionAndAnswer) {
        [$question, $currectAnswer] = $makeQuestionAndAnswer();
        if ($leftRounds === 0) {
            line("Congratulations, %s !", $userName);
            return;
        }

        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        $isAnswerCurrect = ($currectAnswer === $userAnswer);

        if (!$isAnswerCurrect) {
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

    line("Hello, %s!\n", $userName);
    $iter(NUMBER_OF_ROUNDS);
}
