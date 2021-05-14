<?php

namespace App\Controller\Admin;

use App\Entity\Candidate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CandidateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Candidate::class;
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
            TextField::new('cvFile')->setFormType(VichFileType::class)->hideOnIndex(),
            // ImageField::new('fileName')->setBasePath('uploads/cv_candidatures'),
            AssociationField::new('candidacies', 'Candidatures')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'choice_label' => function($candidacy) {
                        return "{$candidacy->getOffers()}";
                    }
                ]),
        ];
    }

    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Liste des candidats')
        ->setDateFormat('medium');
        ;
    }

}
