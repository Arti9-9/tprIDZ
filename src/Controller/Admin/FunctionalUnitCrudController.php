<?php

namespace App\Controller\Admin;

use App\Entity\FunctionalUnit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FunctionalUnitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FunctionalUnit::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
