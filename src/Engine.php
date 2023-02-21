<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function GameEngine($questions, $correctAnswers, $name)
{
    $stepsAmount = count($questions);

    for ($i = 0; $i < $stepsAmount; $i++) {
        $question = $questions[$i];
        $correctAnswer = $correctAnswers[$i];
        line('Question: ' . $question);
        $usersAnswer = prompt('Your answer: ');
        if ($usersAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$usersAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            break;
        }
        line("Congratulations, %s!", $name);
    }
}
