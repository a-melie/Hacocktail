<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\CocktailApi;
use App\Service\FormControl;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index()
    {
        $cocktailApi = new CocktailApi();
        $cocktail = $cocktailApi->getRandomCocktail();
        return $this->twig->render('Home/index.html.twig', ['cocktail' => $cocktail]);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $_SESSION['login'] = FormControl::verifLogin($_POST['login']);
                header('Location: /');
            } catch (\Exception $e) {
                header('Location: /home/login');
            }
        }
        return $this->twig->render("Home/login.html.twig");
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        unset($_SESSION);
        header('location:/');
    }
}
