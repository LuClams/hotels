<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email', EmailType::class)
            ->add('object', ChoiceType::class, [
                'choices' => [
                    'Je souhaite poser une réclamation' => 'Réclamation',
                    'Je souhaite commander un service supplémentaire' => 'Service',
                    'Je souhaite en savoir plus sur une suite' => 'Renseignement Suite',
                    'J\'ai un soucis avec cette application' => 'Bug App'
                ]
            ])
            ->add('message')
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}