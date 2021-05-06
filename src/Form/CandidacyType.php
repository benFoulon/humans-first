<?php

namespace App\Form;

use App\Entity\Candidacy;
use App\Entity\Candidate;
use App\Entity\Offer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidacyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('candidates', EntityType::class, [
                // looks for choices from this entity
                'class' => Candidate::class,
                // uses object properties as the visible option string
                'choice_label' => function($candidate) {
                    return "{$candidate->getFirstname()} {$candidate->getLastname()} ({$candidate->getId()})";
                },
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('offers', EntityType::class, [
                // looks for choices from this entity
                'class' => Offer::class,
                // uses object properties as the visible option string
                'choice_label' => function($offer) {
                    return "{$offer->getTitle()} {$offer->getReference()}";
                },
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidacy::class,
        ]);
    }
}
