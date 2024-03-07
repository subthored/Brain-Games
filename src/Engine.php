<?php

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS = 3;

function gameGreeting()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("\nHello, %s!", $name);
    return $name;
}

function playGame(array $questionAndAnswer, string $description)
{
    $name = gameGreeting();
    line("{$description}");

    for ($i = 0; $i < MAX_ROUNDS; $i += 1) {
        line("{$questionAndAnswer[$i][0]}");
        $userAnswer = prompt('Your answer');
        if ($questionAndAnswer[$i][1] != $userAnswer) {
            line("\"{$userAnswer}\" is wrong answer :( Correct answer was \"{$questionAndAnswer[$i][1]}\"");
            line("\nLet's try again, {$name}");
            exit();
        }
        if ($questionAndAnswer[$i][1] == $userAnswer) {
            line("Correct!\n");
        }
    }

    line("Congratulations, {$name}!");
    exit();
}
