<?php

use function cli\line;

function generatingProgression(int $firstNumber, int $step, int $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $firstNumber + $i * $step;
    }
    return $progression;
}

function progression()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting();
    line("What number is missing in the progression?\n");

    while ($isUserCorrect && $points < 3) {
        $firstNumber = random_int(1, 10);
        $step = random_int(2, 5);
        $length = 10;
        $progression = generatingProgression($firstNumber, $step, $length);
        $hiddenNumberIndex = random_int(0, $length - 1);
        $correctAnswer = $progression[$hiddenNumberIndex];
        $progression[$hiddenNumberIndex] = '..';
        line("Question: %s", implode(' ', $progression));
        $isUserCorrect = isUserCorrect($correctAnswer, $name);
        $points = pointTracker($isUserCorrect, $points, $name);
    }
}
