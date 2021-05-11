<?php

namespace App\Controller\Admin;

use App\Entity\Candidacy;
use App\Entity\Offer;
use App\Entity\Candidate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CandidacyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidacy::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date'),
            AssociationField::new('offers', 'Intitulé')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'choice_label' => function($offer) {
                        return "{$offer->getTitle()} {$offer->getReference()}";
                    }
                ]),
            AssociationField::new('candidates', 'Nom du candidat')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'choice_label' => function($candidate) {
                        return "{$candidate->getFirstname()} {$candidate->getLastname()} ({$candidate->getId()})";
                    },
                ])
        ];
    }

    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Liste des candidatures')
        ->setPageTitle('edit', fn (Candidacy $candidacy) => sprintf('Modification de la candidature: <b>%s</b>', $candidacy->getId()))
        ->setDateFormat('medium');
        ;
    }
}
