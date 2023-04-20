<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LiaisonRepository;
use App\Repository\ReservationRepository;

class TraverseesController extends AbstractController
{
    #[Route('/traversees', name: 'app_traversees')]
    public function index(LiaisonRepository $repo): Response
    {
        return $this->render('traversees/index.html.twig', [
            'controller_name' => 'TraverseesController',
            'liaisons' => $repo->findAll(),
        ]);
    }

    #[Route('/traversees/add/{id}', name: 'reserver_traversee')]
    public function reserver(ReservationRepository $repoReservation, LiaisonRepository $repoLiaison, int $id)
    {
        $traversee = $repoLiaison->find($id);
        dd($traversee);
        $repoReservation->save($traversee);

        return $this->render('traversees/index.html.twig', [
            'controller_name' => 'TraverseesController',
            'liaisons' => $repoLiaison->findAll(),
        ]);
    }   
}
