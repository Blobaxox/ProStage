<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class ProStageController extends AbstractController
{
    public function index()
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stages = $repositoryStage->findAll();
        return $this->render('pro_stage/index.html.twig',
                            ['stages'=>$stages]);
    }

    public function entreprises()
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprises = $repositoryEntreprise->findAll();
        return $this->render('pro_stage/entreprises.html.twig',
                            ['entreprises'=>$entreprises]);
    }

    public function entreprise($id)
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repositoryEntreprise->find($id);
        return $this->render('pro_stage/entreprise.html.twig',
                            ['entreprise'=>$entreprise]);
    }

    public function formations()
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formations = $repositoryFormation->findAll();
        return $this->render('pro_stage/formations.html.twig',
                            ['formations'=>$formations]);
    }

    public function formation($id)
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repositoryFormation->find($id);
        return $this->render('pro_stage/formation.html.twig',
                            ['formation'=>$formation]);
    }

    public function stage($id)
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stage = $repositoryStage->find($id);
        return $this->render('pro_stage/stage.html.twig',
        ['stage'=>$stage]);
    }

}
