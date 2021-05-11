<?php

namespace App\Controller\Admin;

use App\Entity\SpontaneousCandidacy;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SpontaneousCandidacyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SpontaneousCandidacy::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            TextField::new('mail'),
            TextField::new('phone', 'Téléphone'),
            TextField::new('town', 'Ville'),
            TextField::new('highestQualification', 'Plus haut niveau de qualification'),
            TextField::new('activityDomain', 'Domaine d\'activité'),
            TextField::new('cvFile')->setFormType(VichFileType::class)->hideOnIndex(),
            TextField::new('cv')->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Dépôt de candidatures')
        ->setPageTitle('edit', fn (SpontaneousCandidacy $spontaneousCandidacy) => sprintf('Candidature de : <b>%s</b>', $spontaneousCandidacy->getFirstname().' '.$spontaneousCandidacy->getLastname()))
        ->setDateFormat('medium');
        ;
    }
    
}
