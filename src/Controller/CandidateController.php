<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Candidate;
use App\Entity\Offer;
use App\Form\CandidateType;
use App\Repository\CandidateRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidate")
 */
class CandidateController extends AbstractController
{
    /**
     * @Route("/index", name="candidate_index", methods={"GET"})
     *  @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function index(CandidateRepository $candidateRepository): Response
    {
        return $this->render('candidate/index.html.twig', [
            'candidates' => $candidateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="candidate_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);
        $getId= $request->query->get('id');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $OfferRepo = $entityManager->getRepository(Offer::class);
            $offer = $OfferRepo->find($getId);
            $candidacy = new Candidacy();
            $candidacy->setDate(new \DateTime());
            $candidacy->setOffers($offer);
            $candidate->addCandidacy($candidacy);
            $offer->addCandidacy($candidacy);
            $entityManager->persist($candidacy);
            $entityManager->persist($candidate);
            $entityManager->flush();
            return $this->redirectToRoute('candidacy_success');
        }

        return $this->render('candidate/new.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_show", methods={"GET"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function show(Candidate $candidate): Response
    {
        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="candidate_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function edit(Request $request, Candidate $candidate): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('candidate_index');
        }

        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Désolé, cette page n'existe pas")
     */
    public function delete(Request $request, Candidate $candidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('candidate_index');
    }
}
