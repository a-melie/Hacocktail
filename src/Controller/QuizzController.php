<?php


namespace App\Controller;

use App\Model\PixabayApi;
use App\Model\QuizzManager;

class QuizzController extends AbstractController
{
    public function play(string $theme, int $order)
    {
        $quizz = new QuizzManager();
        $questions = $quizz->selectByTheme($theme, $order);
        $pixabay= new PixabayApi();
        $background =$pixabay->getBackgroundById($questions['0']['background_id']);
        return $this->twig->render('Quizz/play.html.twig', [
            'questions' => $questions,
            'background' => $background
            ]);
    }
}
