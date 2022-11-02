<?php

namespace App\Controller\Admin;

use App\Entity\Hostel;
use App\Entity\Room;
use App\Form\RoomFormType;
use App\Form\RoomType;
use App\Form\SlideimageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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


   public function configureActions(Actions $actions): Actions
   {
       return $actions
           // ...
           ->remove(Crud::PAGE_INDEX, Action::NEW)
           ->remove(Crud::PAGE_INDEX, Action::EDIT)
           ->remove(Crud::PAGE_INDEX, Action::DELETE)
           ;
   }

    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('name'),
            TextField::new('city'),
            TextField::new('address'),
            AssociationField::new('supervisor')
                ->setPermission('ROLE_ADMIN'),
            TextareaField::new('description')->stripTags(),
            //AssociationField::new('room'),
           // CollectionField::new('room')->allowAdd(true),
            CollectionField::new('room')->setEntryType(RoomFormType::class),
            CollectionField::new('slidesroom')->setEntryType(SlideimageType::class)

        ];
    }

}
