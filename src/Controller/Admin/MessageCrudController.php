<?php

namespace App\Controller\Admin;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            TextField::new('type'),
            TextField::new('town', 'ville')->hideOnIndex(),
            TextField::new('businessName', 'Nom de l\'entreprise'),
            TextField::new('mail'),
            TextField::new('phone', 'Téléphone')->hideOnIndex(),
            TextField::new('object', 'Objet'),
            TextEditorField::new('content', 'Contenu'),
        ];
    }
    
    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Boite de réception')
        ->setDateFormat('medium');
        ;
    }
}
