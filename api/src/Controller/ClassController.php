<?php

namespace App\Controller;

use App\Entity\SspaClass;
use App\Service\ClassService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class ClassController extends AbstractFOSRestController
{
    /**
     * @var ClassService
     */
    private $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    /**
     * @return Response
     * @Rest\Route("/classes")
     */
    public function getClassesAction()
    {
        $view = $this->view($this->classService->getAllClasses(), Response::HTTP_OK);

        return $this->handleView($view);
    }

    /**
     * @param SspaClass $class
     * @return Response
     * @Rest\Route("/classes/{id}")
     * @ParamConverter("class", class="App\Entity\SspaClass")
     */
    public function getClassAction(SspaClass $class)
    {
        $view = $this->view($class, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
