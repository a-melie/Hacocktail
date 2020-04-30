<?php


namespace App\Controller;

use App\Model\PixabayApi;
use App\Model\QuestionManager;
use App\Model\ThemeManager;

class QuizzController extends AbstractController
{
    public function index()
    {
        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Quizz/index.html.twig', ['themes' => $themes]);
    }

    public function play(string $theme, int $order)
    {
        $quizz = new QuestionManager();
        $questions = $quizz->selectByTheme($theme, $order);
        return $this->twig->render('Quizz/play.html.twig', [
            'questions' => $questions]);
    }
}
