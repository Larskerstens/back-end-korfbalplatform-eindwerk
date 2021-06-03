<?php

namespace App\Controller\Admin;

use App\Entity\Groep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GroepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Groep::class;
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
