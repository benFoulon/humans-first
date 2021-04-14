<?php

namespace App\Controller;

use App\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('pages/home/index.html.twig', [
            'controller_name' => 'HomeController',
            'current_menu' => 'home'
        ]);
    }

    /**
     * @Route("/presentation", name="about")
     */
    public function about(): Response
    {
        return $this->render('pages/about/index.html.twig', [
            'current_menu' => 'about'
        ]);
    }

    /**
     * @Route("/entreprise", name="business")
     */
    public function business(): Response
    {
        return $this->render('pages/business/index.html.twig', [
            'current_menu' => 'business'
        ]);
    }

    /**
     * @Route("/candidat", name="personn")
     */
    public function personn(): Response
    {
        return $this->render('pages/personn/index.html.twig', [
            'current_menu' => 'personn'
        ]);
    }

    /**
     * @Route("/offres", name="offers")
     */
    public function offers(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Offer::class);

        $offers = $repo->findAll();

        return $this->render('pages/offers/index.html.twig', [
            'current_menu' => 'offers',
            'offers' => $offers 
        ]);
    }
}

