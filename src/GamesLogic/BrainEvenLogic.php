<?php

const EVEN_DESCR = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

function evenGame()
{
    $questionAndAnswer = [];

    for ($i = 0; $i < MAX_ROUNDS; $i += 1) {
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        $question = ("Question: {$number}");
        $questionAndAnswer[$i] = [$question, $correctAnswer];
    }

    playGame($questionAndAnswer, EVEN_DESCR);
}
