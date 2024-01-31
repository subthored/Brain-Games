<?php

use function cli\line;
use function cli\prompt;

function divider()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("divider");

    while ($isUserCorrect && $points < 3) {
        $firstNumber = random_int(1, 100);
        $secondNumber = random_int(1, 100);
        $correctAnswer = (string) gcd($firstNumber, $secondNumber);
        line("Question: {$firstNumber} {$secondNumber}");
        $userAnswer = (string) prompt("Your answer");
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
