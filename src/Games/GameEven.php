<?php

namespace BrainGames\GameEven;

use function BrainGames\Engine\GameEngine;
const STEPS_AMOUNT = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;


function GameEven()
{
    $questions = [];
    $correctAnswers = [];
    $i = 0;
    while ($i < STEPS_AMOUNT) {
        $questions[$i] = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswers[$i] = correctAnswer($questions[$i]);
        $i++;
    }
    GameEngine($questions, $correctAnswers);
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
