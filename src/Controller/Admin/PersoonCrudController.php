<?php

namespace App\Controller\Admin;

use App\Entity\Persoon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PersoonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Persoon::class;
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
