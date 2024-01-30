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

        switch ($expression) {
            case 1:
                $correctAnswer = $firstNumber + $secondNumber;
                $expression = "+";
                break;
            case 2:
                $correctAnswer = $firstNumber - $secondNumber;
                $expression = "-";
                break;
            case 3:
                $correctAnswer = $firstNumber * $secondNumber;
                $expression = "*";
                break;
            default:
                break;
        }

        line("Question: %s %s %s", $firstNumber, $expression, $secondNumber);

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
