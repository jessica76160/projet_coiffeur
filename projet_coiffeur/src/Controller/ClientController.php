<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil()
    {
        return $this->render('accueil.html.twig');
    }

    /**
     * @Route("recherche/adresse", name="adresse")
     */
    public function adresse()
    {
        return $this->render('recherche/adresse.html.twig');
    }

    /**
     * @Route("recherche/personne", name="personne")
     */
    public function personne()
    {
        return $this->render('personne.html.twig');
    }

    /**
     * @Route("recherche/horaire", name="horaire")
     */
    public function horaire()
    {
        return $this->render('horaire.html.twig');
    }

    /**
     * @Route("recherche/prestation", name="prestation")
     */
    public function prestation()
    {
        return $this->render('prestation.html.twig');
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation()
    {
        return $this->render('reservation/reservation.html.twig');
    }

    /**
     * @Route("/confirmation", name="confirmation")
     */
    public function confirmation()
    {
        return $this->render('reservation/confirmation.html.twig');
    }

     /**
     * @Route("/connexion1", name="connexion1")
     */
    public function connexion1()
    {
        return $this->render('connexion/connexion1.html.twig');
    }
}

