<?php

namespace App\Controller;

class MetController extends AbstractController
{
    public function random()
    {
        $object = $this->get('https://collectionapi.metmuseum.org/public/collection/v1/search?departmentId=6&q=cat');
        $ramdom = rand(0, $object['total']-1);
        $id = $object['objectIDs'][$ramdom];
        $picData = $this->get('https://collectionapi.metmuseum.org/public/collection/v1/objects/' . $id);

        return $this->twig->render('Met/met.html.twig', [
            'pic_data' => $picData,
        ]);
    }
}
