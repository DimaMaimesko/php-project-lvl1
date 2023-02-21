<?php

namespace BrainGames\GameGcd;

use function BrainGames\Engine\GameEngine;
use function cli\line;
use function cli\prompt;

const STEPS_AMOUNT = 3;
function GameGcd()
{
    $questions = [];
    $correctAnswers = [];
    $i = 0;
    while ($i < STEPS_AMOUNT) {
        $questions[$i] = createQuestion();
        $correctAnswers[$i] = correctAnswer($questions[$i]);
        $i++;
    }
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    GameEngine($questions, $correctAnswers, $name);
}

function createQuestion()
{
    $value1 = randomNumber();
    $value2 = randomNumber();
    return "{$value1} {$value2}";
}

function correctAnswer($question)
{
    $questionItems = explode(' ', $question);
    $value1 = $questionItems[0];
    $value2 = $questionItems[1];
    return gcd($value1, $value2);
}

function randomNumber()
{
    return rand(0, 100);
}

function gcd($num1, $num2)
{
    while ($num1 != $num2) {
        if ($num1 > $num2) {
            $num1 = $num1 - $num2;
        } else {
            $num2 = $num2 - $num1;
        }
    }
    return $num1;
}