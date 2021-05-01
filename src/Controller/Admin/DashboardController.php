<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Offer;
use App\Entity\Candidate;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Message;
use App\Entity\SpontaneousCandidacy;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/humans-first-admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Humans First');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user-edit', User::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope-open-text', Message::class);

        yield MenuItem::section('Recrutement');
        yield MenuItem::linkToCrud('Offres', 'fas fa-search', Offer::class);
        yield MenuItem::linkToCrud('Candidats', 'fas fa-user-check', Candidate::class);
        yield MenuItem::linkToCrud('Candidats spontanés', 'fas fa-users', SpontaneousCandidacy::class);

        yield MenuItem::section('Blog');
        yield MenuItem::linkToCrud('Articles', 'fas fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comment-dots', Comment::class);


    }
}
