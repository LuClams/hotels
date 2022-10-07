<?php

namespace App\Form;

use App\Entity\Booking;
use App\Form\DataTransformer\FrenchToDatetimeTransformer;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
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

    public function getConfiguration($label, $placeholder, $options) {
        return array_merge([
            'label' => $label,
            'attr' => $placeholder
        ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('room', TextType::class, $this->getConfiguration('Nom de la Suite', 'Tapez le nom de la Suite que vous voulez', [
                'required' => false
            ]))
            ->add('startDate',TextType::class, $this->getConfiguration('Début du séjour', 'Choisissez la date de début de votre séjour', [
                'required' => true
            ]))
            ->add('endDate', TextType::class, $this->getConfiguration('Fin du séjour','Choisissez la date de fin de votre séjour', [
                'required' => true
            ] ))
            ->add('amount', MoneyType::class, $this->getConfiguration('Montant de la réservation', '€', [
                'required' => false
            ]))
            ->add('booker', TextType::class, $this->getConfiguration('Nom de la personne qui réserve', 'Tapez votre nom', [
                'required' => false
            ]))
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
