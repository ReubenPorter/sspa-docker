<?php

namespace App\DataFixtures;

use App\Entity\DayOfWeek;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DayOfWeekFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $day = new DayOfWeek();
        $day->setName('Monday')
            ->setCode('MONDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Tuesday')
            ->setCode('TUESDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Wednesday')
            ->setCode('WEDNESDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Thursday')
            ->setCode('THURSDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Friday')
            ->setCode('FRIDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Saturday')
            ->setCode('SATURDAY');
        $manager->persist($day);

        $day = new DayOfWeek();
        $day->setName('Sunday')
            ->setCode('SUNDAY');
        $manager->persist($day);

        $manager->flush();
    }
}
