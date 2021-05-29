<?php

namespace App\Controller\Admin;

use App\Entity\GroupParameter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GroupParameterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupParameter::class;
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
