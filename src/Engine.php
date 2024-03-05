<?php

use function cli\line;
use function cli\prompt;

const MAX_POINTS = 3;

function gameGreeting(string $gameName)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("\nHello, %s!", $name);

    if ($gameName == 'calc') {
        line(CALC_DESCR);
    } elseif ($gameName == 'divider') {
        line(DIV_DESCR);
    } elseif ($gameName == 'even') {
        line(EVEN_DESCR);
    } elseif ($gameName == 'prime') {
        line(PRIME_DESCR);
    } elseif ($gameName == 'progress') {
        line(PROGRESS_DESRCR);
    }

    return $name;
}

function compareAnswers(string $correctAnswer, string $name)
{
    $userAnswer = prompt('Your answer');
    if ($userAnswer !== $correctAnswer) {
        line("'%s' is wrong answer :( Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("\nLet's try again, %s!", $name);
        exit();
    } else {
        return true;
    }
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

function playGame(string $correctAnswer, string $question, int $points, string $name)
{
    $isUserCorrect = true;
    line($question);
    $isUserCorrect = compareAnswers($correctAnswer, $name);
    $points = pointTracker($isUserCorrect, $points, $name);
    return (int) $points;
}
