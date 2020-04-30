<?php


namespace App\Controller;

use App\Model\CocktailApi;
use App\Model\PixabayApi;
use App\Model\QuestionManager;
use App\Model\ThemeManager;
use App\Service\Quizz;

class QuizzController extends AbstractController
{
    public function index()
    {
        $themeManager = new ThemeManager();
        $themes = $themeManager->selectAll();

        return $this->twig->render('Quizz/index.html.twig', ['themes' => $themes]);
    }

    public function initialize(string $theme, int $order)
    {
        if (!isset($_SESSION[$theme]['score'])) {
            $_SESSION[$theme]['score'] = 0;
        }
        if (!isset($_SESSION[$theme]['actual'])) {
            $_SESSION[$theme]['actual'] = 0;
        }
        $_SESSION[$theme]['actual']++;

        header('Location: /quizz/play/' . $theme . '/' . $order);
    }

    public function play(string $theme, int $order)
    {
        $_SESSION[$theme]['actual']++;

        $quizz = new QuestionManager();
        $_SESSION[$theme]['nb_questions'] = count($quizz->selectAllByTheme($theme));
        $questions = $quizz->selectOneByTheme($theme, $order);

        $pixabay = new PixabayApi();
        $background = $pixabay->getBackgroundById($questions['0']['background_id']);

        $cocktail = new CocktailApi();
        $cocktailId = $cocktail->getCocktailById($questions['0']['cocktail_id']);

        return $this->twig->render('Quizz/play.html.twig', [
            'questions'  => $questions[0],
            'background' => $background,
            'cocktail'   => $cocktailId,
            'theme'      => $theme,
        ]);
    }

    public function verifyReponse()
    {
        return Quizz::reponse();
    }

    public function finish(string $theme)
    {
        $score = $_SESSION[$theme]['score'];
        $nbQuestions = $_SESSION[$theme]['nb_questions'];
        $_SESSION[$theme] = [];
        return $this->twig->render('Quizz/finish.html.twig', [
            'score' => $score,
            'nb' => $nbQuestions,
        ]);
    }
}
