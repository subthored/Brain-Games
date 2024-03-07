<?php

const CALC_DESCR = "What is the result of the expression?\n";

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
    return $correctAnswer;
}

function calcGame()
{
    $expressionArray = ["+", "-", "*"];
    $questionAndAnswer = [];

    for ($i = 0; $i < MAX_ROUNDS; $i += 1) {
        $randomKey = array_rand($expressionArray, 1);
        $expression = $expressionArray[$randomKey];
        $firstNumber = random_int(1, 50);
        $secondNumber = ($expression === "*") ? random_int(1, 10) : random_int(1, 50);
        $correctAnswer = (string) calculationLogic($expression, $firstNumber, $secondNumber);
        $question = ("Question: {$firstNumber} {$expression} {$secondNumber}");
        $questionAndAnswer[$i] = [$question, $correctAnswer];
    }

    playGame($questionAndAnswer, CALC_DESCR);
}
