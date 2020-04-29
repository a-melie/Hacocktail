<?php


namespace App\Controller;

class WebcamController extends AbstractController
{
    public function random(string $place)
    {
        $url = 'https://api.windy.com/api/webcams/v2/list/country=IT/category=' . $place . '/limit=50?key=';
        $picData = $this->get($url . APP_API_KEY_WEBCAM);
        $ramdom = rand(0, count($picData['result']['webcams'])-1);
        $webcam = $picData['result']['webcams'][$ramdom];

        return $this->twig->render('Webcam/webcam.html.twig', [
            'webcam' => $webcam,
        ]);
    }
}
