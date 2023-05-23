<?php

namespace App\Controller;

use App\Entity\Musiques;
use App\Repository\MusiquesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminStudioOneController extends AbstractController
{
    /**
     * @Route("/admin/studio/one", name="app_admin_studio_one")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();

        return $this->render('admin/admin_studio_one.html.twig', [
            'controller_name' => 'AdminStudioOneController',
            'musiques' => $musiques,
        ]);
    }

    /**
     * @Route("/admin/studio/create", name="app_studio_create")
     */
    public function createStudio(Request $request, EntityManagerInterface $manager)
    {
        $musiques = new Musiques();

        $form = $this->createForm(MusiqueType::class, $musiques);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($musiques);
            $manager->flush();

            return $this->redirectToRoute('app_admin_studio_one');


        }

        return $this->render('admin/adminStudioForm.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }
}
