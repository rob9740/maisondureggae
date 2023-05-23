<?php

namespace App\Controller;

use App\Entity\Musiques;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="app_cart")
     */
    public function index(SessionInterface $sessionInterface): Response
    {
        $panier = $sessionInterface->get('panier', []);

        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
            'panier' => $panier
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="app_cart_add")
     */
    public function add($id, Musiques $musiques, SessionInterface $sessionInterface): Response
    {
        $panier = $sessionInterface->get('panier', [
            'elements' => [],
            'total' => 0
        ]);

        if (!isset($panier['elements'][$musiques->getId()])) {
            $panier['elements'][$musiques->getId()] = [
                'quantity' => 0,
                'musique' => $musiques
            ];
        }

        $panier['elements'][$musiques->getId()]['quantity'] ++;
        $panier['total'] - $panier['total'] + $musiques->getPrix();

        $sessionInterface->set('panier', $panier);

        return $this->redirectToRoute('cart');

        //return $this->render('cart/index.html.twig', [
        //    'controller_name' => 'CartController',
        //]);
    }

    /**
     * @Route("/cart/clear", name="app_cart_clear")
     */
    public function clear(SessionInterface $sessionInterface)
    {
        $sessionInterface->remove('panier');
     
     
     return $this->redirectToRoute('cart');
    }


}
