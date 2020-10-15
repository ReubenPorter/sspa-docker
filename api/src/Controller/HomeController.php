<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class HomeController extends AbstractFOSRestController
{
    /**
     * @return Response
     * @Rest\Route("/")
     */
    public function getHomeContentAction()
    {
        return $this->render('/client.html.twig', [
            'data' => 'some twig data',
        ]);
    }
}
