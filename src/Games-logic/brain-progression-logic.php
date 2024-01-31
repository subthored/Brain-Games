<?php

use function cli\line;
use function cli\prompt;

function progression()
{
    $points = 0;
    $isUserCorrect = true;

    $name = gameGreeting("progression");

    while ($isUserCorrect && $points < 3) {
        $firstNumber = random_int(1, 10);
        $step = random_int(2, 5);
        $length = 10;
        $progression = generatingProgression($firstNumber, $step, $length);
        $hiddenNumberIndex = random_int(0, $length - 1);
        $correctAnswer = $progression[$hiddenNumberIndex];
        $progression[$hiddenNumberIndex] = '..';
        line("Question: %s", implode(' ', $progression));

        $userAnswer = (string) prompt('Your answer');
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);

        if ($isUserCorrect) {
            line("Correct!\n");
            $points++;
        }

        if ($points === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
