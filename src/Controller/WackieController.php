<?php

namespace App\Controller;

use App\Repository\MusiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WackieController extends AbstractController
{
    /**
     * @Route("/wackie", name="app_wackie")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();
        return $this->render('wackie/index.html.twig', [
            'controller_name' => 'WackieController',
            'label' => 'wackies',
            'musiques' => $musiquesRepository->findBy( ['label' => 'wackies']),
        ]);
    }
}
