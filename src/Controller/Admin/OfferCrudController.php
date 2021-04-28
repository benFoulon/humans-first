<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            IdField::new('id'),
            DateField::new('publication_date'),
            TextField::new('reference'),
            TextField::new('title'),
            TextEditorField::new('description'),
            TextEditorField::new('profile'),
            TextField::new('location'),
            IntegerField::new('vacant_position'),
            TextEditorField::new('experience'),
            TextField::new('status'),
            TextField::new('date_start'),
            TextField::new('contract_type'),
            TextField::new('weekly_work_time'),
            TextField::new('remuneration'),
            TextField::new('further_information'),
            BooleanField::new('isActive')
        ];
    }
    
}
