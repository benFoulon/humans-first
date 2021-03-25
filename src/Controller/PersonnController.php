<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnController extends AbstractController
{
    /**
     * @Route("/candidat", name="personn")
     */
    public function index(): Response
    {
        return $this->render('personn/index.html.twig', [
            'controller_name' => 'PersonnController',
        ]);
    }
}
