<?php

namespace App\Service;

use App\Model\QuestionManager;
use App\Model\ThemeManager;

class Quizz
{
    public static function reponse()
    {
        $json   = file_get_contents('php://input');
        $object = json_decode($json);
        $answer = [
            'reponse'  => $object->reponse,
            'question' => $object->question,
        ];

        $questionManager = new QuestionManager();
        $question = $questionManager->selectOneById($answer['question']);

        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($question[0]['theme_id']);

        Quizz::checkAnswer($answer['reponse'], $question[0]['solution'], $theme['title']);
    }

    public static function checkAnswer(string $answer, string $solution, string $theme): string
    {
        if ($answer === $solution) {
            $_SESSION[$theme]['score']++;
            $_SESSION[$theme]['solution'][] = 'Good Answer !';
        } else {
            $_SESSION[$theme]['solution'][] = 'Too bad ! The good answer is ' . $solution . ' !';
        }
    }
}
