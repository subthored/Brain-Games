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

function isUserCorrect(string $correctAnswer, string $name)
{
    $userAnswer = prompt('Your answer');
    $isUserCorrect = compareAnswers($userAnswer, $correctAnswer, $name);
    return $isUserCorrect;
}

function pointTracker(bool $isUserCorrect, int $points, string $name)
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
