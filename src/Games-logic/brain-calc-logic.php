<?php

use function cli\line;
use function cli\prompt;

function calculationLogic(int $expression, int $firstNumber, int $secondNumber)
{
    $correctAnswer = 0;
    if ($expression === 1) {
        $correctAnswer = $firstNumber + $secondNumber;
        $expression = "+";
    } elseif ($expression === 2) {
        $correctAnswer = $firstNumber - $secondNumber;
        $expression = "-";
    } elseif ($expression === 3) {
        $correctAnswer = $firstNumber * $secondNumber;
        $expression = "*";
    }
    line("Question: %s %s %s", $firstNumber, $expression, $secondNumber);
    return $correctAnswer;
}

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
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
