<?php
namespace BrainGames\Cli\Game\Calc;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "What is the result of the expression?\n";

function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case "+":
            return $num1 + $num2;
            break;
        case "-":
            return $num1 - $num2;
            break;
        case "*":
            return $num1 * $num2;
            break;
    }
}

function makeQuestionAndAnswer()
{
    $operations = ["+", "-", "*"];
    $random1 = random_int(1, 99);
    $random2 = random_int(1, 99);
    $randomOperationtIndex = array_rand($operations, 1);
    $randomOperation = $operations[$randomOperationtIndex];
    $question = sprintf(
        "%d %s %d",
        $random1,
        $randomOperation,
        $random2
    );
    $answer = strval(
        calculate(
            $random1,
            $random2,
            $randomOperation
        )
    );
    return [$question, $answer];
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game, DESCRIPTIOM);
}
