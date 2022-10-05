<?php

namespace App\Form\DataTransformer;

use DateTime;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FrenchToDatetimeTransformer implements DataTransformerInterface
{

    public function transform($date)
    {
        // TODO: Implement transform() method.
        if ($date === null) {
            return '';
        }
        return $date->format('d/m/Y');
    }

    public function reverseTransform($frenchDate)
    {
        // TODO: Implement reverseTransform() method.
        // frenchDate = 20/10/2022
        if ($frenchDate === null) {
            // Exception
            throw new TransformationFailedException("Vous devez fournir une date!");
        }
        $date = \DateTime::CreateFromFormat('d/m/Y', $frenchDate);

        if ($date === false) {
            // Exception
            throw new TransformationFailedException("Le format de la date n'est pas le bon!");
        }
        return $date;
    }
}