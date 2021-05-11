<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('publicationDate')
            ->add('title')
            ->add('excerpt')
            ->add('content')
            ->add ( 'imageFile' , VichFileType :: class, [
                'required' => true ,
                'allow_delete' => false ,
                'download_uri' => true ,
                'download_label' => 'download_file',
                // ' asset_helper ' => true ,
                'label' => 'Ajouter une image',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => function($category) {
                    return "{$category->getTitle()}";
                },
                'multiple' => true,
                'expanded' => true, 
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
