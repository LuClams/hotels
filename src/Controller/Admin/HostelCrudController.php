<?php

namespace App\Controller\Admin;

use App\Entity\Hostel;
use App\Entity\Room;
use App\Form\RoomFormType;
use App\Form\RoomType;
use App\Form\SlideimageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HostelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hostel::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('name')
            ;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('name'),
            TextField::new('city'),
            TextField::new('address'),
            AssociationField::new('supervisor'),
            TextareaField::new('description')->stripTags(),
            CollectionField::new('room')->setEntryType(RoomFormType::class),
           // CollectionField::new('room')->useEntryCrudForm(RoomCrudController::class, 'new', 'edit'),
            CollectionField::new('slideimages')->setEntryType(SlideimageType::class)

        ];
    }

}
