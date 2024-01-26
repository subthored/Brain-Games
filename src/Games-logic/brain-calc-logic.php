<?php

use function cli\line;
use function cli\prompt;

function calcGame()
{
    // Initializing starting variables
    $points = 0;
    $maxPoints = 3;
    $isUserCorrect = true;

    // Greeting
    $name = gameGreeting();
    line("\nWhat is the result of the expression?");

    // Game logic
    while ($isUserCorrect === true && $points !== 3) {
        $expression = random_int(1, 3);
        $firstNumber = random_int(1, 50);
        $secondNumber = ($expression === 3) ? random_int(1, 10) : random_int(1, 50);

        // Defining an expression
        switch ($expression) {
            case 1:
                $correctAnswer = $firstNumber + $secondNumber;
                $expression = "+";
                break;
            case 2:
                $correctAnswer = $firstNumber - $secondNumber;
                $expression = "-";
                break;
            case 3:
                $correctAnswer = $firstNumber * $secondNumber;
                $expression = "*";
                break;
            default:
                break;
        }

        line("Question: %s %s %s", $firstNumber, $expression, $secondNumber);

        // Get player answer and check if it's correct
        $userAnswer = (int)prompt("Your answer");
        $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);

        // Adding point
        if ($isUserCorrect) {
            line("Correct!\n");
            $points++;
        }

        // Win message
        if ($points === $maxPoints) {
            line("Congratulations, %s!", $name);
        }
    }
}
