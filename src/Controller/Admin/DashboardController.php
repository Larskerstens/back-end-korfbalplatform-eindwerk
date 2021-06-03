<?php

namespace App\Controller\Admin;

use App\Entity\Agenda;
use App\Entity\Club;
use App\Entity\Groep;
use App\Entity\Persoon;
use App\Entity\Postcode;
use App\Entity\Team;
use App\Entity\Training;
use App\Entity\User;
use App\Entity\Wedstrijd;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(DashboardController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Back End Korfbalplatform Eindwerk');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
         yield MenuItem::section('Gebruikers');
        yield MenuItem::linkToCrud('Gebruikers', 'fa fa-users-cog', User::class);
        yield MenuItem::section('Agenda');
        yield MenuItem::linkToCrud('Agenda', 'fa fa-calendar', Agenda::class);
        yield MenuItem::section('Onze club');
        yield MenuItem::linkToCrud('Groepen', 'fa fa-user-friends', Groep::class);
        yield MenuItem::linkToCrud('Teams', 'fa fa-users', Team::class);
        yield MenuItem::linkToCrud('Leden', 'fa fa-user', Persoon::class);
        yield MenuItem::linkToCrud('Trainingen', 'fa fa-running', Training::class);
        yield MenuItem::linkToCrud('Wedstrijden', 'fa fa-futbol', Wedstrijd::class);
        yield MenuItem::section('Andere clubs');
        yield MenuItem::linkToCrud('Clubs', 'fa fa-house-damage', Club::class);
        yield MenuItem::section('Postcodes');
        yield MenuItem::linkToCrud('Postcodes', 'fa fa-map-marker-alt', Postcode::class);

    }
}