<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Slideimage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('image', TextType::class)
            ->add('description', TextareaType::class)
            ->add('price', MoneyType::class)
        //    ->add('countrooms', NumberType::class)
            ->add('hostel')
         //   ->add('supervisor')
           // ->add('booker')
            ->add('slideimages', EntityType::class, [
             // looks for choices from this entity
             'class' => Slideimage::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
