<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Offer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('cv')
            ->add('candidacy', EntityType::class, [
                // looks for choices from this entity
                'class' => Offer::class,
                'multiple' => true,
                'expanded' => true,
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
