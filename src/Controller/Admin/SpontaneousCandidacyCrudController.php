<?php

namespace App\Controller\Admin;

use App\Entity\SpontaneousCandidacy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpontaneousCandidacyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SpontaneousCandidacy::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
