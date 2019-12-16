<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $DUTInfo = new Formation();
        $DUTInfo->setNom("DUT Info");
        $manager->persist($DUTInfo);

        $manager->flush();
    }
}
