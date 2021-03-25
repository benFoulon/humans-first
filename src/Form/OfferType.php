<?php

namespace App\Form;

use App\Entity\Offer;
use App\Entity\Candidate;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('publication_date') 
            ->add('reference')
            ->add('title')
            ->add('description')
            ->add('profile')
            ->add('location')
            ->add('vacantPosition')
            ->add('experience')
            ->add('status')
            ->add('dateStart')
            ->add('contractType')
            ->add('weeklyWorkTime')
            ->add('remuneration')
            ->add('further_information')
            ->add('candidates', EntityType::class, [
                // looks for choices from this entity
                'class' => Candidate::class,
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
