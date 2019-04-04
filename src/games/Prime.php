<?php
namespace BrainGames\Cli\Game\Prime;
use const BrainGames\Cli\Data\Primes\PRIMES;
use function BrainGames\Cli\Game\run;

const DESCRIPTIOM = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

function makeQuestionAndAnswer()
{
    $random = random_int(0, 500);
    $answer = in_array($random, PRIMES, true) ? "yes" : "no";
    $question = strval($random);

    return [$question, $answer];
}

function start()
{
    [$game] = array_reverse(explode("\\", __NAMESPACE__));
    run($game, DESCRIPTIOM);
}
