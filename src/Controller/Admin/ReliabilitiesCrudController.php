<?php

namespace App\Controller\Admin;

use App\Entity\Reliabilities;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ReliabilitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reliabilities::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('equipments','Оборужование'),
            NumberField::new('value', 'Значение'),
            DateField::new('date', 'Дата'),
        ];
    }

}
