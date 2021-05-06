<?php

namespace App\Form;

use App\Entity\SpontaneousCandidacy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class SpontaneousCandidacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('mail')
            ->add('phone')
            ->add('town')
            ->add('highestQualification')
            ->add('activityDomain')
            -> add ( 'cvFile' , VichFileType :: class, [
                'required' => true ,
                'allow_delete' => false ,
                'download_uri' => true ,
                'download_label' => 'download_file',
                // ' asset_helper ' => true ,
                'label' => 'Ajouter votre CV',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SpontaneousCandidacy::class,
            'translation_domain' => 'forms'
        ]);
    }
}
