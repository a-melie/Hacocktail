<?php


namespace App\Controller;

class NasaController extends AbstractController
{
    public function picture()
    {
        $picData = $this->get('https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY');

        return $this->twig->render('Nasa/picture.html.twig', [
            'pic_data' => $picData,
        ]);
    }
}
