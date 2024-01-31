<?php

use function cli\line;
use function cli\prompt;

function gameGreeting($game)
{
    if ($game === "even") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("Answer 'yes' if the number is even, otherwise answer 'no'.\n");
        return $name;
    }

    if ($game === "calc") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("What is the result of the expression?\n");
        return $name;
    }

    if ($game === "divider") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("Find the greatest common divisor of given numbers?\n");
        return $name;
    }

    if ($game === "progression") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("What number is missing in the progression?\n");
        return $name;
    }
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
