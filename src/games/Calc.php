<?php
namespace BrainGames\games\Calc;
use function BrainGames\Game\run;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculate($num1, $num2, $operator)
{
    switch ($operator) {
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
        $operatorIndex = array_rand(OPERATORS);
        $operator = OPERATORS[$operatorIndex];
        $question = "$random1 $operator $random2";
        $answer = strval(
            calculate(
                $random1,
                $random2,
                $operator
            )
        );
        return [$question, $answer];
    };

    run(DESCRIPTION, $makeQuestionAndAnswer);
}
