<?php

use function cli\line;
use function cli\prompt;

function evenGame()
{
// Initializing starting variables
    $counter = (int) 0;
    $correct = true;

// Greeting
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("\nHello, %s!", $name);
    line("Answer 'yes' if the number is even, otherwise answer 'no'.\n");

    do {
// Set a random number
        $number = random_int(1, 100);
        $correctAnswer = ($number % 2 === 0) ? 'yes' : 'no';
        line("Question: %s", $number);

// Get player answer and check if it's correct
        $answer = prompt('Your answer');
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;( Correct answer was '%s'.", $answer, $correctAnswer);
            line("\nLet's try again, %s!", $name);
            $correct = false;
            break;
        } else {
            line("Correct!\n");
            $counter++;
// End game message
            if ($counter === 3) {
                line("Congratulations, %s!", $name);
            }
        }
    } while ($correct === true && $counter !== 3);
}
