<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;


function GameEngine($questions, $correctAnswers)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
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