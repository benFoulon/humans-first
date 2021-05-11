<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Offer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('mail')
            ->add('phone')
            ->add('town')
            -> add ( 'cvFile' , VichFileType :: class, [
                'required' => true ,
                'allow_delete' => false ,
                'download_uri' => true ,
                'download_label' => 'download_file',
                // ' asset_helper ' => true ,
                'label' => 'Ajouter votre CV',
            ])
            // ->add('candidacies', EntityType::class, [
            //     'class' => Candidacy::class,
            //     'choice_label' => function($offer) {
            //         return "{$offer->getTitle()} {$offer->getReference()}";
            //     },
            //     'multiple' => true,
            //     'expanded' => true,
            // ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
            'translation_domain' => 'forms'
        ]);
    }
}
