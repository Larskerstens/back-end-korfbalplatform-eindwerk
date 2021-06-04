<?php

namespace App\Controller\Admin;

use App\Entity\Persoon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PersoonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Persoon::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('voornaam', 'Voornaam'),
            TextField::new('achternaam', 'Achternaam'),
            IntegerField::new('leeftijd', 'Leeftijd'),
            DateField::new('geboortedatum', 'Geboortedatum')->setFormat("d-M-y"),
            TextField::new('straat', 'Straatnaam'),
            IntegerField::new('huisnr', 'Huisnummer'),
            AssociationField::new('postcodeId', 'Postcode persoon'),
            AssociationField::new('teamId', 'Team'),
            AssociationField::new('persoongroep', 'Groep waar de persoon in zit')->hideOnIndex(),
        ];
    }

}
