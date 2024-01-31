<?php

use function cli\line;
use function cli\prompt;

function calcGame()
{
    $points = 0;
    $maxPoints = 3;
    $isUserCorrect = true;

    $name = gameGreeting("calc");

    while ($isUserCorrect && $points < $maxPoints) {
        $expression = random_int(1, 3);
        $firstNumber = random_int(1, 50);
        $secondNumber = ($expression === 3) ? random_int(1, 10) : random_int(1, 50);

        $correctAnswer = (string) calculationLogic($expression, $firstNumber, $secondNumber);

        $userAnswer = (string) prompt("Your answer");
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
