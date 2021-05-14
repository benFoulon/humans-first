<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('publication_date', 'Date de publication'),
            TextField::new('reference', 'Référence'),
            TextField::new('title', 'Intitulé'),
            TextEditorField::new('description'),
            TextEditorField::new('profile', 'Profil'),
            TextField::new('location', 'Localisation'),
            IntegerField::new('vacant_position', 'Poste à pourvoir'),
            TextField::new('status', 'Statut')->hideOnIndex(),
            TextField::new('date_start', 'Date de démarrage'),
            TextField::new('contract_type', 'Type de contrat')->hideOnIndex(),
            TextField::new('weekly_work_time', 'Temps de travail hebomadaire')->hideOnIndex(),
            TextField::new('remuneration', 'Rémunération')->hideOnIndex(),
            TextField::new('further_information', 'Informations complémentaires')->hideOnIndex(),
            BooleanField::new('isActive', 'Offre active'),
            TextEditorField::new('excerpt', 'Extrait'),
            AssociationField::new('candidacies', 'Candidatures')
                ->setFormTypeOptions([
                    'choice_label' => function($offers) {
                        return "{$offers->getCandidates()}";
                    }
            ]),
        ];  
    }

    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Liste des offres')
        ->setDateFormat('medium');
        ;
    }
    
}
