<?php

use function cli\line;

function calculationLogic(string $expression, int $firstNumber, int $secondNumber)
{
    $correctAnswer = 0;
    if ($expression === "+") {
        $correctAnswer = $firstNumber + $secondNumber;
    } elseif ($expression === "-") {
        $correctAnswer = $firstNumber - $secondNumber;
    } elseif ($expression === "*") {
        $correctAnswer = $firstNumber * $secondNumber;
    }
    line("Question: %s %s %s", $firstNumber, $expression, $secondNumber);
    return $correctAnswer;
}

function calcGame()
{
    $points = 0;
    $maxPoints = 3;
    $isUserCorrect = true;
    $expressionArray = ["+", "-", "*"];

    $name = gameGreeting();
    line("What is the result of the expression?\n");

    while ($isUserCorrect && $points < $maxPoints) {
        $randomKey = array_rand($expressionArray, 1);
        $expression = $expressionArray[$randomKey];
        $firstNumber = random_int(1, 50);
        $secondNumber = ($expression === "*") ? random_int(1, 10) : random_int(1, 50);

        $correctAnswer = (string) calculationLogic($expression, $firstNumber, $secondNumber);
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
