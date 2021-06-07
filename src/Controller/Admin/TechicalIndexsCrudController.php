<?php

namespace App\Controller\Admin;

use App\Entity\TechicalIndexs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechicalIndexsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TechicalIndexs::class;
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
