<?php

namespace App\Controller\Admin;

use App\Entity\Training;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TrainingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Training::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('datum', 'Datum')->setFormat("d-M-y"),
            TimeField::new('startuur', 'Startuur van de training')->setFormat("HH:mm"),
            TimeField::new('stopuur', 'Einduur van de training')->setFormat("HH:mm"),
            AssociationField::new('teamId', 'Team dat moet trainen')
        ];
    }

}
