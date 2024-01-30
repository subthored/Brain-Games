<?php

use function cli\line;
use function cli\prompt;

function evenGame()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("even");

    while ($isUserCorrect && $points < 3) {
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", $number);

        $userAnswer = prompt('Your answer');
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);

        if ($isUserCorrect) {
            line("Correct!\n");
            $points++;
        }

        if ($points === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
