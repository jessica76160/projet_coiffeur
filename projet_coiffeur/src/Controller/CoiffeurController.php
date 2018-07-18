<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoiffeurController extends Controller
{
    /**
     * @Route("/coiffeur", name="coiffeur")
     */
    public function index()
    {
        return $this->render('coiffeur/index.html.twig', [
            'controller_name' => 'CoiffeurController',
        ]);
    }
}
