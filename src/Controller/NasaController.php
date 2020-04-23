<?php


namespace App\Controller;

class NasaController extends AbstractController
{
    public function picture()
    {
        $picData = $this->get('https://api.nasa.gov/planetary/apod?api_key=' . APP_API_KEY);

        return $this->twig->render('Nasa/picture.html.twig', [
            'pic_data' => $picData,
        ]);
    }
}
