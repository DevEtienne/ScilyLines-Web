<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;


class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $client = $this->getUser();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'profil/index.html.twig',
            'user' => $client
        ]);
    }
    #[Route('/profil/modifier/prenom', name: 'doctrine_update_prenom')]
    public function modifierPrenom(Request $request, ClientRepository $repo){
        $value = $request->get('prenom');
        $client = $this->getUser();
        $repo->update($client, 1, $value);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $client
        ]);
    }

    #[Route('/profil/modifier/nom', name: 'doctrine_update_nom')]
    public function modifierNom(Request $request, ClientRepository $repo){
        $value = $request->get('nom');
        $client = $this->getUser();
        $repo->update($client, 2, $value);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $client
        ]);
    }

    #[Route('/profil/modifier/email', name: 'doctrine_update_email')]
    public function modifierEmail(Request $request, ClientRepository $repo){
        $value = $request->get('email');
        $client = $this->getUser();
        $repo->update($client, 3, $value);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $client
        ]);
    }

    #[Route('/profil/modifier/tel', name: 'doctrine_update_tel')]
    public function modifierTel(Request $request, ClientRepository $repo){
        $value = $request->get('tel');
        $client = $this->getUser();
        $repo->update($client, 4, $value);
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $client
        ]);
    }
}
