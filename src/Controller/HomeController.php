<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param OfferRepository $repository
     * @return Response
     */
    public function index(OfferRepository $repository): Response
    {
        $offers = $repository->findLatest();
        return $this->render('pages/home/index.html.twig', [
            'controller_name' => 'HomeController',
            'current_menu' => 'home',
            'offers' => $offers
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
    public function offers(OfferRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $offers = $paginator->paginate(
            $repository->findAllActiveQuery(), /* just 'getRequest' */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
    );
        

        return $this->render('pages/offers/index.html.twig', [
            'current_menu' => 'offers',
            'offers' => $offers,

        ]);
    }

    /**
     * @Route("/message-envoyé", name="message_success")
     */
    public function messageSend(): Response
    {
        return $this->render('pages/success_redirection/success_message.html.twig');
    }

    /**
     * @Route("/candidature-envoyé", name="candidacy_success")
     */
    public function candidacySend(): Response
    {
        return $this->render('pages/success_redirection/success_candidacy.html.twig');
    }
}

