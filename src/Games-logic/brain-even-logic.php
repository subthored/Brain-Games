<?php

use function cli\line;

function evenGame()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("even");

    while ($isUserCorrect && $points < 3) {
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", $number);
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
