<?php
// src/Controller/Admin/Filter/DateCalendarFilter.php
namespace App\Controller\Admin\Filter;

use App\Form\Admin\DateCalendarFilterType;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FilterDataDto;
use EasyCorp\Bundle\EasyAdminBundle\Filter\FilterTrait;

class DateCalendarFilter implements FilterInterface
{
    use FilterTrait;

    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
        ->setFilterFqcn(__CLASS__)
        ->setProperty($propertyName)
        ->setLabel($label)
        ->setFormType(DateCalendarFilterType::class);
    }

    public function apply(QueryBuilder $queryBuilder, FilterDataDto $filterDataDto, ?FieldDto $fieldDto, EntityDto $entityDto): void
    {
        if ('today' === $filterDataDto->getValue()) {
        $queryBuilder->andWhere(sprintf('%s.%s = :today', $filterDataDto->getEntityAlias(), $filterDataDto->getProperty()))
        ->setParameter('today', (new \DateTime('today'))->format('Y-m-d'));
    }

    // ...
    }
}