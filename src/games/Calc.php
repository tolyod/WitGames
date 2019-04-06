<?php
namespace BrainGames\Cli\Game\Calc;
use function BrainGames\Cli\Game\run;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = ["+", "-", "*"];

function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case "+":
            return $num1 + $num2;
        case "-":
            return $num1 - $num2;
        case "*":
            return $num1 * $num2;
    }
}

function start()
{
    $makeQuestionAndAnswer = function () {
        $random1 = random_int(1, 99);
        $random2 = random_int(1, 99);
        $randomOperationtIndex = array_rand(OPERATIONS);
        $randomOperation = OPERATIONS[$randomOperationtIndex];
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
    };

    run(
        DESCRIPTION,
        $makeQuestionAndAnswer
    );
}
