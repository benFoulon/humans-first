<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Offer;
use App\Form\OfferType;
use App\Repository\OfferRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offer")
 */
class OfferController extends AbstractController
{
    /**
     * @Route("/index", name="offer_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function index(OfferRepository $offerRepository): Response
    {
        return $this->render('offer/index.html.twig', [
            'offers' => $offerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="offer_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function new(Request $request): Response
    {
        $offer = new Offer();
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offer);
            $entityManager->flush();

            return $this->redirectToRoute('offer_index');
        }

        return $this->render('offer/new.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}-{id}", name="offer_show", methods={"GET"}, requirements={"slug": "[a-z0-9\-]*"} )
     */
    public function show(Offer $offer, string $slug): Response
    {
        if ($offer->getSlug() !== $slug) {
            return $this->redirectToRoute('offer_show', [
                'id' => $offer->getId(),
                'slug' => $offer->getSlug()
            ], 301);
        }

        return $this->render('pages/offers/offer.html.twig', [
            'offer' => $offer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offer_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function edit(Request $request, Offer $offer): Response
    {
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offer_index');
        }

        return $this->render('offer/edit.html.twig', [
            'offer' => $offer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offer_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function delete(Request $request, Offer $offer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($offer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offer_index');
    }
}
