<?php

namespace App\Controller\Admin;

use App\Entity\Groep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GroepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Groep::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('naam', 'Groepsnaam'),
            AssociationField::new('persoons','Groepsleden')
        ];
    }

}
