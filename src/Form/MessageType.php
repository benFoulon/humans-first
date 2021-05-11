<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('type', ChoiceType::class, [
                'choices'=>[
                    'Entreprise' => 'Entreprise',
                    'Candidat' => 'Candidat'
                ]
            ])
            ->add('town')
            ->add('businessName')
            ->add('mail')
            ->add('phone')
            ->add('object')
            ->add('content')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        
        $resolver->setDefaults([
            'data_class' => Message::class,
            'translation_domain' => 'forms'
        ]);
    }
}
