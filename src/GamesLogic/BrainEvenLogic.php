<?php

use function cli\line;

function evenGame()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting();
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");

    while ($isUserCorrect && $points < 3) {
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", $number);
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
