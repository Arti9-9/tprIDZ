<?php

namespace App\Controller\Admin;

use App\Entity\ReliabilitiesIGrP;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ReliabilitiesIGrPCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReliabilitiesIGrP::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('group_parametr','Параметр группы'),
            NumberField::new('value', 'Значение'),
            DateField::new('date', 'Дата'),
        ];
    }

}
