<?php

const DIV_DESCR = "Find the greatest common divisor of given numbers?\n";

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
    $questionAndAnswer = [];

    for ($i = 0; $i < MAX_ROUNDS; $i += 1) {
        $firstNumber = random_int(1, 100);
        $secondNumber = random_int(1, 100);
        $correctAnswer = (string) gcd($firstNumber, $secondNumber);
        $question = ("Question: {$firstNumber} {$secondNumber}");
        $questionAndAnswer[$i] = [$question, $correctAnswer];
    }

    playGame($questionAndAnswer, DIV_DESCR);
}
