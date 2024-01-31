<?php

use function cli\line;
use function cli\prompt;

function gameGreeting($game)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);

    if ($game === "even") {
        line("Answer 'yes' if the number is even, otherwise answer 'no'.\n");
    } elseif ($game === "calc") {
        line("What is the result of the expression?\n");
    } elseif ($game === "divider") {
        line("Find the greatest common divisor of given numbers?\n");
    } elseif ($game === "progression") {
        line("What number is missing in the progression?\n");
    } elseif ($game === "prime") {
        line("Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");
    }

    return $name;
}

function calculationLogic($expression, $firstNumber, $secondNumber)
{
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

function compareAnswers($userAnswer, $correctAnswer, $name)
{
    if ($userAnswer == 0) {
        line("\nYou must type integer number!");
        line("Let's try again, %s", $name);
        return false;
    }
    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer :( Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("\nLet's try again, %s!", $name);
        return false;
    } else {
        return true;
    }
}

function gcd($firstNumber, $secondNumber)
{
    if ($firstNumber > $secondNumber) {
        $b = $firstNumber;
        $a = $secondNumber;
    } else {
        $a = $firstNumber;
        $b = $secondNumber;
    }

    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

function generatingProgression($firstNumber, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $firstNumber + $i * $step;
    }
    return $progression;
}

function isNumberPrime($number)
{
    if ($number < 2) {
        return 'no';
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}
