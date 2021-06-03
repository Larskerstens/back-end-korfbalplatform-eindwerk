<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Team::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('naam', 'Categorie op basis van leeftijd'),
            IntegerField::new('aantal', 'Aantal spelers in het team'),
            AssociationField::new('teamId', 'Spelers van het team')->hideOnIndex()
        ];
    }

}
