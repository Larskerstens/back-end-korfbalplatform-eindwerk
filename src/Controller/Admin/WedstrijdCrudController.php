<?php

namespace App\Controller\Admin;

use App\Entity\Wedstrijd;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class WedstrijdCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Wedstrijd::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('datum', 'Datum')->setFormat("d-M-y"),
            TimeField::new('startuur', 'Startuur')->setFormat("HH:mm"),
            TimeField::new('stopuur', 'Einduur')->setFormat("HH:mm"),
            AssociationField::new('teamId', 'Team'),
            AssociationField::new('clubThuis', 'De ploeg die thuis speelt'),
            IntegerField::new('scorethuis', 'Score van de thuisploeg'),
            AssociationField::new('clubUit', 'De ploeg die uit speelt'),
            IntegerField::new('scoreuit', 'Score van de uitploeg'),
            TextareaField::new('matchverloop', 'Verslag van de match')
        ];
    }

}
