<?php

const PRIME_DESCR = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

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
    $name = gameGreeting('prime');

    while ($points != MAX_POINTS) {
        $number = random_int(0, 100);
        $correctAnswer = isNumberPrime($number);
        $question = ("Question: {$number}");
        $points = playGame($correctAnswer, $question, $points, $name);
    }
}
