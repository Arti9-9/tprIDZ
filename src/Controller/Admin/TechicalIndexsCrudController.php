<?php

namespace App\Controller\Admin;

use App\Entity\TechicalIndexs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class TechicalIndexsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TechicalIndexs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('equipment','Оборудование'),
            NumberField::new('value', 'Значение'),
            DateField::new('date', 'Дата'),
        ];
    }

}
