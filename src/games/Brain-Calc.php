<?php
namespace BrainGames\Cli\Game\BrainCalc;

function makeQuestion()
{
    $cacl = function ($num1, $num2, $op) {
        switch ($op) {
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
    };

    $ops = ["+", "-", "*"];
    $rand1 = random_int(1, 99);
    $rand2 = random_int(1, 99);
    $randOpIndex = random_int(0, 2);
    $randOp = $ops[$randOpIndex];
    $question = sprintf(
        "%d %s %d",
        $rand1,
        $randOp,
        $rand2
    );
    $answer = $cacl(
        $rand1,
        $rand2,
        $randOp
    );
    return [$question, strval($answer)];
}

function getRules()
{
    return "What is the result of the expression?\n";
}
