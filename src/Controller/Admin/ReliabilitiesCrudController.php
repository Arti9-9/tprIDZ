<?php

namespace App\Controller\Admin;

use App\Entity\Reliabilities;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReliabilitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reliabilities::class;
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
