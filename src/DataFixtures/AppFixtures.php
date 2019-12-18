<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        //============================ FORMATIONS ================================
        $DUTInfo = new Formation();
        $DUTInfo->setNom("DUT Info");

        $LPNum = new Formation();
        $LPNum->setNom("LP Numerique");

        $LPProg = new Formation();
        $LPProg->setNom("LP Prog avancee");

        $listForm = array($DUTInfo,$LPNum,$LPProg);
        foreach ($listForm as $f){
            $manager->persist($f);
        }

        //====================================== ENTREPRISES ================================
        $nbEntreprise = $faker->numberBetween($min = 3, $max = 10);
        $listEntreprise = array();
        for ($i = 0; $i <= $nbEntreprise ; $i++)
        {
            $entreprise = new Entreprise();
            
            $entreprise->setNom($faker->company);
            $entreprise->setActivite($faker->jobTitle);
            $entreprise->setAdresse($faker->address);
            $nomEntreprise = $entreprise->getNom();
            $entreprise->setSite($faker->regexify('http\:\/\/'.$nomEntreprise.'\.'.$faker->tld));

            $listEntreprise[] = $entreprise;
        }
        foreach ($listEntreprise as $e){
            $manager->persist($e);
        }

        $nbStage = $faker->numberBetween($min = 5, $max = 15);

        

        

        $manager->flush();
    }
}
