<?php


namespace App\Controller;

use App\Model\CocktailApi;
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
        $pixabay = new PixabayApi();
        $background = $pixabay->getBackgroundById($questions['0']['background_id']);
        $cocktail = new CocktailApi();
        $cocktailId = $cocktail->getCocktailById($questions['0']['cocktail_id']);
        return $this->twig->render('Quizz/play.html.twig', [
            'questions' => $questions[0],
            'background' => $background,
            'cocktail' => $cocktailId
        ]);
    }
}
