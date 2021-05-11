<?php

namespace App\Controller;

use App\Entity\SpontaneousCandidacy;
use App\Form\SpontaneousCandidacyType;
use App\Repository\SpontaneousCandidacyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/spontaneous-candidacy")
 */
class SpontaneousCandidacyController extends AbstractController
{
    /**
     * @Route("/index", name="spontaneous_candidacy_index", methods={"GET"})
     */
    public function index(SpontaneousCandidacyRepository $spontaneousCandidacyRepository): Response
    {
        return $this->render('spontaneous_candidacy/index.html.twig', [
            'spontaneous_candidacies' => $spontaneousCandidacyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="spontaneous_candidacy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $spontaneousCandidacy = new SpontaneousCandidacy();
        $form = $this->createForm(SpontaneousCandidacyType::class, $spontaneousCandidacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spontaneousCandidacy);
            $entityManager->flush();

            return $this->redirectToRoute('spontaneous_candidacy_index');
        }

        return $this->render('spontaneous_candidacy/new.html.twig', [
            'spontaneous_candidacy' => $spontaneousCandidacy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spontaneous_candidacy_show", methods={"GET"})
     */
    public function show(SpontaneousCandidacy $spontaneousCandidacy): Response
    {
        return $this->render('spontaneous_candidacy/show.html.twig', [
            'spontaneous_candidacy' => $spontaneousCandidacy,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="spontaneous_candidacy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SpontaneousCandidacy $spontaneousCandidacy): Response
    {
        $form = $this->createForm(SpontaneousCandidacyType::class, $spontaneousCandidacy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spontaneous_candidacy_index');
        }

        return $this->render('spontaneous_candidacy/edit.html.twig', [
            'spontaneous_candidacy' => $spontaneousCandidacy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spontaneous_candidacy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SpontaneousCandidacy $spontaneousCandidacy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spontaneousCandidacy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($spontaneousCandidacy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('spontaneous_candidacy_index');
    }
}
