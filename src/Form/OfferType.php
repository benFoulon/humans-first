<?php

namespace App\Form;

use App\Entity\Candidacy;
use App\Entity\Offer;
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
            ->add('status')
            ->add('dateStart')
            ->add('contractType')
            ->add('weeklyWorkTime')
            ->add('remuneration')
            ->add('further_information')
            ->add('excerpt')
            ->add('candidacies', EntityType::class, [
                'class' => Candidacy::class,
                'choice_label' => function($candidacy) {
                    return "{$candidacy->getCandidates()}";
                },
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
