<?php
namespace BrainGames\GameGcd;

use function BrainGames\Engine\GameEngine;

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
    GameEngine($questions, $correctAnswers);
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
    return gmp_gcd($value1, $value2);
}

function randomNumber()
{
    return rand(0, 100);
}