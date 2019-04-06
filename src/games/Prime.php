<?php
namespace BrainGames\games\Prime;
use function BrainGames\Game\run;

const DESCRIPTIOM = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    $deviderLimit = intval(sqrt($num));
    if ($num < 1) {
        return false;
    }
    for ($devider = 2; $deviderLimit > $devider; $devider++) {
        if ($num % $devider === 0) {
            return false;
        }
    }
    return true;
}

function start()
{
    $makeQuestionAndAnswer = function () {
        $random = random_int(0, 500);
        $answer = isPrime($random) ? "yes" : "no";
        $question = $random;

        return [$question, $answer];
    };

    run(DESCRIPTIOM, $makeQuestionAndAnswer);
}
