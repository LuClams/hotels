<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            TextField::new('title'),
            TextField::new('image'),
            ImageField::new('image', 'imageFile')
                ->setBasePath('images/room')
                ->setUploadDir('public/images/room')
                ->setUploadedFileNamePattern('[randomhash], [extension]')
                ->setRequired(false),
            TextEditorField::new('description'),
            IntegerField::new('price'),
            //AssociationField::new('booking'),
            AssociationField::new('hostel'),
            AssociationField::new('supervisor')
        ];
    }

}
