<?php

namespace App\Controller\Admin;

use App\Entity\Persoon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
            DateTimeField::new('geboortedatum', 'Geboortedatum'),
            TextField::new('straat', 'Straatnaam'),
            IntegerField::new('huisnr', 'Huisnummer'),
            AssociationField::new('postcodeId', 'Postcode persoon'),
            AssociationField::new('teamId', 'Team waar de persoon in speelt'),
            AssociationField::new('persoongroep', 'Groep waar de persoon in zit')->hideOnIndex(),
        ];
    }

}
