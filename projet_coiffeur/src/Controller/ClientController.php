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
        return $this->render('recherche/personne.html.twig');
    }

    /**
     * @Route("recherche/prestations", name="prestations")
     */
    public function prestations()
    {
        return $this->render('recherche/prestations.html.twig');
    }
}
