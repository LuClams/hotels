<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Filter\DateCalendarFilter;
use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ...
            ->add(DateCalendarFilter::new('startDate'))
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('room'),
            DateField::new('startDate'),
            DateField::new('endDate'),
            MoneyField::new('amount')->setCurrency('EUR'),
            AssociationField::new('booker')
        ];
    }

}
