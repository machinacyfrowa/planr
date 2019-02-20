<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \DateTime;
use App\Entity\Activity;
use App\Entity\Room;
use App\Entity\RoomType;
use App\Entity\Division;
use App\Entity\Course;
use App\Entity\Tutor;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            //create room types
            $roomType = new RoomType();
            $roomType->setName("Random room type" . rand(1,200));
            $manager->persist($roomType);
        }
        $manager->flush();
        $roomTypes = $manager->getRepository("App:RoomType")->findAll();
        for ($i = 0; $i < 20; $i++) {
            //create rooms
            $room = new Room();
            $room->setName("Random room " . rand(1,200));
            $room->setCapacity(rand(10,25));
            $room->setMaxCapacity(rand(35,40));
            $room->setRoomType($roomTypes[array_rand($roomTypes)]);
            $manager->persist($room);
        }
        $manager->flush();
        $rooms = $manager->getRepository("App:Room")->findAll();
        for ($i = 0; $i < 20; $i++) {
            //create courses (subjects)
            $course = new Course();
            $course->setName("Random course " . rand(1,200));
            $manager->persist($course);
        }
        $manager->flush();
        $courses = $manager->getRepository("App:Course")->findAll();
        for ($i = 0; $i < 20; $i++) {
            //create divistions (student groups)
            $division = new Division();
            $division->setName("Random division " . rand(1,200));
            $manager->persist($division);
        }
        $manager->flush();
        $divisions = $manager->getRepository("App:Division")->findAll();
        for ($i = 0; $i < 20; $i++) {
            //create divistions (student groups)
            $tutor = new Tutor();
            $tutor->setFirstName("Random");
            $tutor->setLastName("Tutor" . rand(1,200));
            $tutor->setDegree("Level ".rand(0,2));
            $manager->persist($tutor);
        }
        $manager->flush();
        $tutors = $manager->getRepository("App:Tutor")->findAll();
        for ($i = 0; $i < 20; $i++) {
            $activity = new Activity();
            $randomStartDT = new DateTime();
            $randomStartDT->setTimestamp(time() - rand(1000, 10000));
            $activity->setBegin($randomStartDT);
            $randomEndDT = new DateTime();
            $randomEndDT->setTimestamp(time() + rand(1000, 10000));
            $activity->setEnd($randomEndDT);
            $activity->setRoom($rooms[array_rand($rooms)]);
            $activity->setCourse($courses[array_rand($courses)]);
            $activity->setDivision($divisions[array_rand($divisions)]);
            $activity->setTutor($tutors[array_rand($tutors)]);
            $manager->persist($activity);
        }
        $manager->flush();
    }
}
