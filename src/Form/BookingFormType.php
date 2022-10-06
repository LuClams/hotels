<?php

namespace App\Form;

use App\Entity\Booking;
use App\Form\DataTransformer\FrenchToDatetimeTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingFormType extends AbstractType
{
    private $transformer;

    public function __construct(FrenchToDatetimeTransformer $transformer) {
        $this->transformer = $transformer;
    }

    public function getConfiguration($label, $placeholder) {
        return [
            'label' => $label,
            'attr' => $placeholder
        ];
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('room')
            ->add('startDate',TextType::class, $this->getConfiguration('Début du séjour', 'Choisissez la date de début de votre séjour'))
            ->add('endDate', TextType::class, $this->getConfiguration('Fin du séjour','Choisissez la date de fin de votre séjour' ))
            ->add('amount')
            ->add('booker')
        ;

        $builder->get('startDate')->addModelTransformer($this->transformer);
        $builder->get('endDate')->addModelTransformer($this->transformer);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
