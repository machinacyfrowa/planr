<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ScheduledActivity;
use \DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $activity = new ScheduledActivity();
            $randomStartDT = new DateTime();
            $randomStartDT->setTimestamp(time() - rand(1000, 10000));
            $activity->setBegin($randomStartDT);
            $randomEndDT = new DateTime();
            $randomEndDT->setTimestamp(time() + rand(1000, 10000));
            $activity->setEnd($randomEndDT);
            $activity->setName("Random activity " . rand(1,200));
            $activity->setClassroom("Random classroom " . rand(1,200));
            $activity->setStudentGroup("Random group" . rand(1,200));
            $activity->setLecturer("Random lecturer " . rand(1,200));
            $manager->persist($activity);
        }
        $manager->flush();
    }
}
