<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('publicationDate', 'Date de publication'),
            TextField::new('title', 'Titre'),
            TextEditorField::new('excerpt', 'Extrait'),
            TextEditorField::new('content', 'Contenu'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('imageName', 'Image')->setBasePath('uploads/article_picture')->hideOnForm(),
            BooleanField::new('isActive', 'Article actif'),
            AssociationField::new('category', 'Catégorie')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'choice_label' => function($category) {
                        return "{$category->getTitle()}";
                    }
                ]),
        ];
    }

    public function configureCrud(Crud $crud) :Crud
    {
        return $crud
        ->setPageTitle('index', 'Liste des articles')
        ->setPageTitle('edit', fn (Article $article) => sprintf('Modification de : <b>%s</b>', $article->getTitle()))
        ->setDateFormat('medium');
        ;
    }
    
}
