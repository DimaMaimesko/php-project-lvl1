<?php

namespace BrainGames\GameEven;

use function cli\line;
use function cli\prompt;

const STEPS_AMOUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function GameEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= STEPS_AMOUNT; $i++) {
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = correctAnswer($randomNumber);
        line('Question: ' . $randomNumber);
        $usersAnswer = prompt('Your answer: ');
        if ($usersAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$usersAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
        line("Congratulations, %s!", $name);
    }

}

function correctAnswer($randomNumber)
{
    if (isEven($randomNumber)) {
        return 'yes';
    }
    return 'no';
}

function isEven($number){
    if($number % 2 == 0){
        return true;
    }
    return false;
}
