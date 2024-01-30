<?php

use function cli\line;
use function cli\prompt;

function divider()
{
    $points = 0;
    $maxPoints = 3;
    $isUserCorrect = true;

    $name = gameGreeting("divider");

    while ($isUserCorrect && $points < $maxPoints) {
        $firstNumber = random_int(1, 100);
        $secondNumber = random_int(1, 100);
        $correctAnswer = gcd($firstNumber, $secondNumber);
        line("Question: {$firstNumber} {$secondNumber}");
        $userAnswer = (int)prompt("Your answer");
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);

        if ($isUserCorrect) {
            line("Correct!\n");
            $points++;
        }

        if ($points === $maxPoints) {
            line("Congratulations, %s!", $name);
        }
    }
}
