<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use App\Form\SlideimageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
          //  ->add('title')
            ->add(EntityFilter::new('supervisor'))

            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('title'),
            TextField::new('image'),
            ImageField::new('image', 'imageFile')
                ->setBasePath('/images/room')
                ->setUploadDir('public/images/room/')
                ->setUploadedFileNamePattern('[slug].[extension]')
                ->setRequired(false),
            TextareaField::new('description')->stripTags(),
            MoneyField::new('price') ->setCurrency('EUR'),
            AssociationField::new('bookings'),
            AssociationField::new('hostel'),
            AssociationField::new('supervisor'),
         //   NumberField::new('countrooms'),
            CollectionField::new('slideimages')->setEntryType(SlideimageType::class)
        ];
    }

}
