<?php

namespace App\Controller;

use App\Entity\Musiques;
use App\Form\MusiqueType;
use App\Repository\MusiquesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminTrojanController extends AbstractController
{
    /**
     * @Route("/admin/trojan", name="app_admin_trojan")
     */
    public function index(MusiquesRepository $musiquesRepository): Response
    {
        $musiques = $musiquesRepository->findAll();
        return $this->render('admin/admin_trojan.html.twig', [
            'controller_name' => 'AdminTrojanController',
            'musiques' => $musiques,
        ]);
    }

    /**
     * @Route("/admin/trojan/create", name="app_trojan_create")
     */
    public function createTrojan(Request $request, EntityManagerInterface $manager)
    {
        $musiques = new Musiques();

        $form = $this->createForm(MusiqueType::class, $musiques);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $manager->persist($musiques);
            $manager->flush();

            return $this->redirectToRoute('app_admin_trojan');


        }

        return $this->render('admin/adminTrojanForm.html.twig', [
            'formulaire' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/trojan/delete-{id}", name="app_trojan_delete")
     */
    public function deleteTrojan(MusiquesRepository $musiquesRepository, EntityManagerInterface $manager, $id)
    {
        $musiques = $musiquesRepository->find($id);

        $manager->remove($musiques);
        $manager->flush();

        return $this->redirectToRoute('app_admin_trojan');
    }

    /**
     * @Route("/admin/trojan/update-{id}", name="app_trojan_update")
     */
    public function updateTrojan(MusiquesRepository $musiquesRepository, Request $request, EntityManagerInterface $manager, $id)
    {
        $musiques = $musiquesRepository->find($id);

        $form = $this->createForm(MusiqueType::class, $musiques);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($musiques);
            $manager->flush();

            return $this->redirectToRoute('app_admin_trojan');
        }



        return $this->render('admin/adminTrojanForm.html.twig', [
            'formulaire' => $form->createView()
        ]);

    }


}
