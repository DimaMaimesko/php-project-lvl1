<?php

namespace BrainGames\GamePrime;

use function BrainGames\Engine\GameEngine;
use function cli\line;
use function cli\prompt;

const STEPS_AMOUNT = 3;
function GamePrime()
{
    $questions = [];
    $correctAnswers = [];
    $j = 0;
    while ($j < STEPS_AMOUNT) {
        $questions[$j] = rand(1, 500);
        $correctAnswers[$j] = isNumberPrime($questions[$j]);
        $j++;
    }

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    GameEngine($questions, $correctAnswers, $name);
}

function isNumberPrime(int $number)
{
    if ($number == 1) {
        return 'no';
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}
