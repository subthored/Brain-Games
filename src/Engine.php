<?php

use function cli\line;
use function cli\prompt;

function gameGreeting($game)
{
    if ($game === "even") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("Answer 'yes' if the number is even, otherwise answer 'no'.\n");
        return $name;
    }

    if ($game === "calc") {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, %s!", $name);
        line("\nWhat is the result of the expression?");
        return $name;
    }
}

function compareAnswers($userAnswer, $correctAnswer, $name)
{
    if ($userAnswer == 0) {
        line("\nYou must type integer number!");
        line("Let's try again, %s", $name);
        return false;
    }
    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer :( Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("\nLet's try again, %s!", $name);
        return false;
    } else {
        return true;
    }
}
