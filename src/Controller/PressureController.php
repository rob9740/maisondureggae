<?php

namespace App\Controller;

use App\Repository\MusiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PressureController extends AbstractController
{
    /**
     * @Route("/pressure", name="app_pressure")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();

        return $this->render('pressure/index.html.twig', [
            'controller_name' => 'PressureController',
            'label' => 'pressure sound',
            'musiques' => $musiquesRepository->findBy( ['label' => 'pressure sound']),
        ]);
    }
}
