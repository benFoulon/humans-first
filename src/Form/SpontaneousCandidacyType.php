<?php

namespace App\Form;

use App\Entity\SpontaneousCandidacy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpontaneousCandidacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fisrtname')
            ->add('lastname')
            ->add('mail')
            ->add('phone')
            ->add('town')
            ->add('highestQualification')
            ->add('activityDomain')
            ->add('cv')
            ->add('motivationLetter')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SpontaneousCandidacy::class,
        ]);
    }
}
