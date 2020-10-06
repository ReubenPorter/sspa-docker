<?php

namespace App\DataFixtures;

use App\Entity\TutorType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TutorTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type = new TutorType();
        $type->setName('Course leader')
            ->setDescription('A course leader')
            ->setCode('COURSE_LEADER');
        $manager->persist($type);

        $type = new TutorType();
        $type->setName('Resident')
            ->setDescription('A resident tutor')
            ->setCode('RESIDENT');
        $manager->persist($type);

        $type = new TutorType();
        $type->setName('Guest')
            ->setDescription('A guest tutor')
            ->setCode('GUEST');
        $manager->persist($type);

        $manager->flush();
    }
}
