<?php

const EVEN_DESCR = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

function evenGame()
{
    $points = 0;
    $name = gameGreeting('even');

    while ($points != MAX_POINTS) {
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        $question = ("Question: {$number}");
        $points = playGame($correctAnswer, $question, $points, $name);
    }
}
