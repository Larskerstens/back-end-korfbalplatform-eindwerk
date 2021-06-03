<?php


namespace App\Controller;


use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends abstractController
{

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home()
    {

        return $this->render('base.html.twig');

        /*
        return $this->render('team/team.html.twig', [
                'teams' => $teams
            ]
        );
        */
    }

}