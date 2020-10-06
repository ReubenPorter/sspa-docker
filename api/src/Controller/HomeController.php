<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class HomeController extends AbstractFOSRestController
{
    /**
     * @return Response
     * @Rest\Route("/home")
     */
    public function getHomeContentAction()
    {
        $data = ['content' => 'some about data'];
        $view = $this->view($data, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
