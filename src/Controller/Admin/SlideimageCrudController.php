<?php

namespace App\Controller\Admin;

use App\Entity\Slideimage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SlideimageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slideimage::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
