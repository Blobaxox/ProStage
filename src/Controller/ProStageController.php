<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProStageController extends AbstractController
{
    public function index()
    {
        return $this->render('pro_stage/index.html.twig');
    }

    public function entreprises()
    {
        return $this->render('pro_stage/entreprises.html.twig');
    }

    public function formations()
    {
        return $this->render('pro_stage/formations.html.twig');
    }

    public function stage($id)
    {
        return $this->render('pro_stage/stage.html.twig',
        ['idStage'=>$id]);
    }

}
