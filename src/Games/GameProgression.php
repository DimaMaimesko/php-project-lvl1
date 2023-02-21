<?php
namespace BrainGames\GameProgression;

use function BrainGames\Engine\GameEngine;

const STEPS_AMOUNT = 3;
function GameProgression()
{
    $questions = [];
    $correctAnswers = [];
    $j = 0;
    while ($j < STEPS_AMOUNT) {
        $progressionStart = rand(0, 100);
        $progressionStep = rand(1, 20);
        $stepsAmount = rand(5, 10);
        $progression = [];
        $nextValue = $progressionStart;
        for($i = 0; $i < $stepsAmount; $i++) {
            $nextValue += $progressionStep;
            $progression[] = $nextValue;
        }
        $hiddenPosition = rand(0, $stepsAmount - 1);
        $correctAnswers[$j] = $progression[$hiddenPosition];
        $progression[$hiddenPosition] = '..';
        $questions[$j] = implode(' ', $progression);
        $j++;
    }
    GameEngine($questions, $correctAnswers);
}
