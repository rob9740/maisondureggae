<?php

namespace App\Controller;

use App\Repository\MusiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrojanController extends AbstractController
{
    /**
     * @Route("/trojan", name="app_trojan")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();
        return $this->render('trojan/index.html.twig', [
            'controller_name' => 'TrojanController',
            'label' => 'trojan records',
            'musiques' => $musiquesRepository->findBy( ['label' => 'trojan records']),
            
        ]);
    }
}
