<?php

namespace App\Controller;

use App\Repository\MusiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioOneController extends AbstractController
{
    /**
     * @Route("/studio/one", name="app_studio_one")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();

        return $this->render('studio_one/index.html.twig', [
            'controller_name' => 'StudioOneController',
            'label' => 'studio One',
            'musiques' => $musiquesRepository->findBy( ['label' => 'studio one']),
        ]);
    }
}
