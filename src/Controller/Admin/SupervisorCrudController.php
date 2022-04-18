<?php

namespace App\Controller\Admin;

use App\Entity\Supervisor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class SupervisorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Supervisor::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            AssociationField::new('user', 'email'),
            AssociationField::new('hostel'),
            AssociationField::new('room')
        ];
    }

}
