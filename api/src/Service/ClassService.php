<?php


namespace App\Service;


use App\Repository\SspaClassRepository;

class ClassService
{
    /**
     * @var SspaClassRepository
     */
    private $classRepository;

    public function __construct(SspaClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAllClasses()
    {
        return $this->classRepository->findAll();
    }
}