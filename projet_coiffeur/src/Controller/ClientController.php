<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Form\UserType;
use App\Form\ClientType;
use App\Entity\User;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientController extends Controller
{
    /**
     * @Route("/client/inscription", name="client_inscription")
     */

    public function inscriptionClient(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // generer les formulaires

            $user = new User();
            $form1 = $this->createForm(UserType::class, $user);

            $client = new Client();
            $form2 = $this->createForm(ClientType::class, $client);

            $form1->handleRequest($request);
            $form2->handleRequest($request);
            $erreursClient=[];
            $erreursUser=[];
            

        // apres submit :

            if ($form1->isSubmitted() && $form1->isValid() && $form2->isSubmitted() && $form2->isValid()) {


                    $password = $passwordEncoder->encodePassword($user, $user->getPassword());
                    $user->setPassword($password);
                    $user->setRoles(['CLIENT']);

                    //lier user et client

                    $client->setUser($user);

                    // On enregistre l'utilisateur dans la base
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                    $em->persist($client);
                    $em->flush();

                    return $this->redirectToRoute('connexion');
                
            }

        // renvoyer la page d'inscription

        return $this->render(
            'client/inscription.html.twig',
            array('form1' => $form1->createView(),'form2' => $form2->createView(),'erreursClient'=>$erreursClient,'erreursUser'=>$erreursUser)
        );
    }
    
}
