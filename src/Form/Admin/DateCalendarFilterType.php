<?php
// src/Form/Type/Admin/DateCalendarFilterType.php
namespace App\Form\Admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateCalendarFilterType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => [
                'Today' => 'today',
                'This month' => 'this_month',
                // ...
            ],
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}