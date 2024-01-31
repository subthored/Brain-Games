<?php

use function cli\line;
use function cli\prompt;

function prime()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("prime");

    while ($isUserCorrect && $points < 3) {
        $number = random_int(0, 100);
        $correctAnswer = isNumberPrime($number);
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
