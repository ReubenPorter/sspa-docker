<?php

namespace App\Controller;

use App\Entity\Tutor;
use App\Repository\TutorRepository;
use App\Repository\TutorTypeRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class TutorController extends AbstractFOSRestController
{
    /**
     * @var TutorRepository
     */
    private $tutorRepository;
    /**
     * @var TutorTypeRepository
     */
    private $tutorTypeRepository;

    public function __construct(TutorRepository $tutorRepository, TutorTypeRepository $tutorTypeRepository)
    {
        $this->tutorRepository = $tutorRepository;
        $this->tutorTypeRepository = $tutorTypeRepository;
    }

    /**
     * @return Response
     * @Rest\Route("/tutors")
     */
    public function getTutorsAction()
    {
        $leaderType = $this->tutorTypeRepository->findOneBy(['code' => 'COURSE_LEADER']);
        $residentType = $this->tutorTypeRepository->findOneBy(['code' => 'RESIDENT']);
        $guestType = $this->tutorTypeRepository->findOneBy(['code' => 'GUEST']);

        $leaderTutors = $this->tutorRepository->findBy(['tutorType' => $leaderType]);
        $residentTutors = $this->tutorRepository->findBy(['tutorType' => $residentType]);
        $guestTutors = $this->tutorRepository->findBy(['tutorType' => $guestType]);

        $view = $this->view([
            'course_leaders' => $leaderTutors,
            'resident_tutors' => $residentTutors,
            'guest_type' => $guestTutors,
        ], Response::HTTP_OK);

        return $this->handleView($view);
    }

    /**
     * @param Tutor $tutor
     * @return Response
     * @Rest\Route("/tutors/{id}")
     * @ParamConverter("tutor", class="App\Entity\Tutor")
     */
    public function getTutorAction(Tutor $tutor)
    {
        $view = $this->view($tutor, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
