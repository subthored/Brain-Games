<?php

use function cli\line;
use function cli\prompt;

function gameGreeting()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function compareAnswers($userAnswer, $correctAnswer, $name)
{
    if ($userAnswer == 0) {
        line("\nYou must type integer number!");
        line("Let's try again, %s", $name);
        $isAnswerCorrect = false;
        return $isAnswerCorrect;
    }
    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer :( Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("\nLet's try again, %s!", $name);
        $isAnswerCorrect = false;
    } else {
        $isAnswerCorrect = true;
    }
    return $isAnswerCorrect;
}
