<?php

namespace App\Controller;

use App\Repository\TestimonialRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class TestimonialController extends AbstractFOSRestController
{
    /**
     * @var TestimonialRepository
     */
    private $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    /**
     * @return Response
     * @Rest\Route("/testimonials")
     */
    public function getTestimonialsAction()
    {
        $data = $this->testimonialRepository->findAll();
        $view = $this->view($data, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
