<?php

use function cli\line;
use function cli\prompt;

function divider()
{
    // Initializing starting variables
    $points = 0;
    $maxPoints = 3;
    $isUserCorrect = true;

    $name = gameGreeting("divider");

    // Game logic
    while ($isUserCorrect && $points < $maxPoints) {
        $firstNumber = random_int(1, 100);
        $secondNumber = random_int(1, 100);
        $correctAnswer = gcd($firstNumber, $secondNumber);
        line("Question: {$firstNumber} {$secondNumber}");
        $userAnswer = (int)prompt("Your answer");
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);
        // Adding point
        if ($isUserCorrect) {
            line("Correct!\n");
            $points++;
        }

        // Win message
        if ($points === $maxPoints) {
            line("Congratulations, %s!", $name);
        }
    }
}
