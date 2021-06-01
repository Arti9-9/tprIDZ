<?php

namespace App\Controller\Admin;

use App\Entity\FunctionalUnit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FunctionalUnitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FunctionalUnit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('equipment', 'Оборудование'),
            NumberField::new('weight', 'Вес'),
            NumberField::new('appraisal', 'Оценка'),
            DateTimeField::new('date', 'Дата последнего тестирования'),
        ];
    }

}
