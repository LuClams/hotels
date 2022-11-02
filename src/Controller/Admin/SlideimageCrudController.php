<?php

namespace App\Controller\Admin;

use App\Entity\Slideimage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SlideimageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slideimage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('url'),
            TextareaField::new('caption'),
            AssociationField::new('room')
        ];
    }

}
