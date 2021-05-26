<?php


namespace App\Controller;


use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends abstractController
{

    /**
     * @Route("/")
     */
    public function home(TeamRepository $teamRepository)
    {

        $teams = $teamRepository->findAll();

        return new Response('Dit is de homepage test van de HomeController');

        /*
        return $this->render('team/team.html.twig', [
                'teams' => $teams
            ]
        );
        */
    }

}