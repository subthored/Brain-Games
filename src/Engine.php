<?php

use function cli\line;
use function cli\prompt;

function gameGreeting(string $game)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);

    if ($game === "even") {
        line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    } elseif ($game === "calc") {
        line("What is the result of the expression?\n");
    } elseif ($game === "divider") {
        line("Find the greatest common divisor of given numbers?\n");
    } elseif ($game === "progression") {
        line("What number is missing in the progression?\n");
    } elseif ($game === "prime") {
        line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
    }

    return $name;
}

function compareAnswers(string $userAnswer, string $correctAnswer, string $name)
{
    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer :( Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("\nLet's try again, %s!", $name);
        return false;
    } else {
        return true;
    }
}

function gameLaunch(string $game)
{
    if ($game === "calc") {
        calcGame();
    } elseif ($game === "even") {
        evenGame();
    } elseif ($game === "divider") {
        divider();
    } elseif ($game === "progression") {
        progression();
    } elseif ($game === "prime") {
        prime();
    }
}

function isUserCorrect($correctAnswer, $name)
{
    $userAnswer = prompt('Your answer');
    $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);
    return $isUserCorrect;
}

function pointTracker($isUserCorrect, $points, $name)
{
    if ($isUserCorrect && $points < 2) {
        line("Correct!\n");
        $points++;
        return $points;
    }

    if ($isUserCorrect && $points == 2) {
        line("Congratulations, %s!", $name);
        $points++;
        return $points;
    }
}
