<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = \Faker\Factory::create('fr_FR');

        //============================ FORMATIONS ================================
        $DUTInfo = new Formation();
        $DUTInfo->setNomCourt("DUT Info");
        $DUTInfo->setNomLong("Diplome Universitaire Technologique Informatique");

        $LPNum = new Formation();
        $LPNum->setNomCourt("LP Numerique");
        $LPNum->setNomLong("Licence Profesionnelle Numerique");

        $LPProg = new Formation();
        $LPProg->setNomCourt("LP Prog avancee");
        $LPProg->setNomLong("License Profesionnelle Programation avancee");

        $DUTIC = new Formation();
        $DUTIC->setNomCourt("DU TIC");
        $DUTIC->setNomLong("Diplome Universitaire TIC");

        $listForm = array($DUTInfo,$LPNum,$LPProg,$DUTIC);
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

        //====================================== STAGES ================================
        $nbStage = $faker->numberBetween($min = 5, $max = 15);
        $listStage = array();
        for ($i = 0; $i <= $nbStage ; $i++){
            $stage = new Stage();

            $stage->setTitre($faker->jobTitle);
            $stage->setDescription($faker->realText($maxNbChars = 1000, $indexSize = 2));
            $stage->setEmail($faker->email);

            $indiceEntreprise = $faker->numberBetween($min = 0, $max = sizeof($listEntreprise)-1);
            $stage->setEntreprise($listEntreprise[$indiceEntreprise]);

            $nbForm = $faker->numberBetween($min = 0, $max = sizeof($listForm)-1);
            for ($y = 0 ; $y <= $nbForm; $y++){
                $IndiceForm = $faker->numberBetween($min = 0, $max = sizeof($listForm)-1);
                $stage->addFormation($listForm[$IndiceForm]);
            }
            

            $listStage[] = $stage;
        }
        foreach ($listStage as $s){
            $manager->persist($s);
        }

        $manager->flush();
        
    }
}
