<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ReservationRepository;

class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'app_reservations')]
    public function index(ReservationRepository $repo): Response
    {
        return $this->render('reservations/index.html.twig', [
            'controller_name' => 'ReservationsController',
            'reservations' => $repo->findAll(),
        ]);
    }

}
