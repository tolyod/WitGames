<?php
namespace BrainGames\Cli\Game\Prime;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    $deviderLimit = intval(sqrt($num));

    if ($num < 1) {
        return false;
    }

    for ($devider = 2; $deviderLimit <= $num; $devider++) {
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
        $question = strval($random);

        return [$question, $answer];
    };

    run(
        DESCRIPTIOM,
        $makeQuestionAndAnswer
    );
}
