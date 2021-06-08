<?php

namespace App\Controller\Admin;

use App\Entity\GroupParameter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GroupParameterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupParameter::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Имя'),
            AssociationField::new('functionalUnit','Узел'),
            NumberField::new('weight','Вес'),
            NumberField::new('lambda','Лямбда'),
        ];
    }

}
