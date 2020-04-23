<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 * PHP version 7
 */

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Exception;

/**
 *
 */
abstract class AbstractController
{
    /**
     * @var Environment
     */
    protected $twig;


    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => !APP_DEV,
                'debug' => APP_DEV,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
    }

    protected function get(string $url)
    {
        $client   = HttpClient::create();
        $response = $client->request('GET', $url);
        if ($response->getStatusCode() === 403) {
            throw new Exception('
            Access forbidden, check your API Key.
            ');
        } elseif ($response->getStatusCode() !== 200) {
            throw new Exception('
            Impossible to resolve this request. 
            Please check your URL and your API KEY');
        } else {
            return $response->toArray();
        }
    }
}
