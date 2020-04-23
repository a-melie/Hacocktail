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

    protected function get(string $url, bool $toArray = true) : array
    {
        $client   = HttpClient::create();
        $response = $client->request('GET', $url);
        if ($response->getStatusCode() === 200) {
            return $toArray ? $response->toArray() : $response->getContent() ;
        } else {
            throw new \Exception('
            Impossible to resolve this request. 
            Please check your URL and your API KEY');
        }
    }
}
