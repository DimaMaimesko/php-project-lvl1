<?php

namespace BrainGames\GameCalc;

use function BrainGames\Engine\GameEngine;
use function cli\line;
use function cli\prompt;

const STEPS_AMOUNT = 3;
const OPERATIONS = ['+', '-', '*'];
function GameCalc()
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
    line('What is the result of the expression');

    GameEngine($questions, $correctAnswers, $name);
}

function createQuestion()
{
    $value1 = randomNumber();
    $value2 = randomNumber();
    $operation = randomOperation();
    return "{$value1} {$operation} {$value2}";
}

function correctAnswer(string $question)
{
    $questionItems = explode(' ', $question);
    $value1 = $questionItems[0];
    $value2 = $questionItems[2];
    $operation = $questionItems[1];
    switch ($operation) {
        case '+':
            return (int)$value1 + (int)$value2;
        case '-':
            return (int)$value1 - (int)$value2;
        case '*':
            return (int)$value1 * (int)$value2;
    }
}

function randomOperation()
{
    return OPERATIONS[rand(0, 2)];
}

function randomNumber()
{
    return rand(0, 100);
}
