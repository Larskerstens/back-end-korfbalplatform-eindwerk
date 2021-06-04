<?php

namespace App\Controller\Admin;

use App\Entity\Agenda;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class AgendaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agenda::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('datum', 'Datum')->setFormat("d-M-y"),
            TimeField::new('startuur', 'Startuur')->setFormat("HH:mm"),
            TimeField::new('stopuur', 'Einduur')->setFormat("HH:mm"),
            AssociationField::new('groepId', 'Groep'),
            //AssociationField::new('trainingId', 'Training'), kan dit laten tonen
            AssociationField::new('wedstrijdId', 'Wedstrijd'),
            TextField::new('afspraaknaam', 'Herhaal de categorie ter bevestiging'),
        ];
    }

}
