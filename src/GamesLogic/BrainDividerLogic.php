<?php

use function cli\line;

function gcd(int $firstNumber, int $secondNumber)
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

function divider()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting();
    line("Find the greatest common divisor of given numbers?\n");

    while ($isUserCorrect && $points < 3) {
        $firstNumber = random_int(1, 100);
        $secondNumber = random_int(1, 100);
        $correctAnswer = (string) gcd($firstNumber, $secondNumber);
        line("Question: %s %s", $firstNumber, $secondNumber);
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
