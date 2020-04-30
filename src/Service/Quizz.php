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

        var_dump($answer);

        $questionManager = new QuestionManager();
        $question = $questionManager->selectOneById($answer['question']);

        $themeManager = new ThemeManager();
        $theme = $themeManager->selectOneById($question[0]['theme_id']);

        Quizz::actualNbQuestion($theme['title']);

        return Quizz::checkAnswer($answer['reponse'], $question[0]['solution'], $theme['title']);
    }

    public static function checkAnswer(string $answer, string $solution, string $theme): string
    {
        if ($answer === $solution) {
            if (!isset($_SESSION[$theme]['score'])) {
                $_SESSION[$theme]['score'] = 0;
            }
            $_SESSION[$theme]['score']++;
            $sentence = 'Good Answer !';
        } else {
            $sentence = 'Too bad ! The good answer is ' . $solution . '!';
        }
        return $sentence;
    }

    public static function actualNbQuestion(string $theme)
    {
        if (!isset($_SESSION[$theme]['actual'])) {
            $_SESSION[$theme]['actual'] = 0;
        }
        $_SESSION[$theme]['actual']++;
    }
}
