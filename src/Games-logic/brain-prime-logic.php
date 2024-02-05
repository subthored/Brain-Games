<?php

use function cli\line;

function isNumberPrime(int $number)
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

function prime()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("prime");

    while ($isUserCorrect && $points < 3) {
        $number = random_int(0, 100);
        $correctAnswer = isNumberPrime($number);
        line("Question: %s", $number);
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
