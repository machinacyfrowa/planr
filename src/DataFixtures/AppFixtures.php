<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Activity;
use App\Entity\Room;
use App\Entity\RoomType;
use \DateTime;

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
            $activity = new Activity();
            $randomStartDT = new DateTime();
            $randomStartDT->setTimestamp(time() - rand(1000, 10000));
            $activity->setBegin($randomStartDT);
            $randomEndDT = new DateTime();
            $randomEndDT->setTimestamp(time() + rand(1000, 10000));
            $activity->setEnd($randomEndDT);
            $activity->setName("Random activity " . rand(1,200));
            $activity->setStudentGroup("Random group" . rand(1,200));
            $activity->setLecturer("Random lecturer " . rand(1,200));
            $activity->setRoom($rooms[array_rand($rooms)]);
            $manager->persist($activity);
        }
        $manager->flush();
    }
}
