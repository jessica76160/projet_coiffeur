<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Form\UserType;
use App\Entity\PrestationClient;
use App\Form\ClientType;
use App\Form\PrestationClientType;
use App\Entity\User;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
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
     * @Route("recherche/resultats", name="resultats")
     */
    public function resultats()
    {
        return $this->render('recherche/resultats.html.twig');
    }

    // /**
    //  * @Route("recherche/prestation", name="prestation")
    //  */
    // public function prestation(Request $request)
    // {
    //     $prestation = new Prestation();
    //     $form = $this   ->create FormBuilder($prestation)
    //                     ->add('genre', EntityType::class, ['class'=>Genre::class, 'choice_label'=>"genre"])
    //                     ->add('creer', SubmitType::class, ['label'=>'Créer une prestation'])
    //                     ->getForm();
    //     return $this->render('recherche/personne.html.twig', ['form'=>$form->createView()]);
    // }

    /**
     * @Route("/recherche/detail", name="recherche_detail")
     */

    public function rechercheDetail(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // generer les formulaires

            $prestationClient = new PrestationClient();
            $form1 = $this->createForm(PrestationClientType::class, $prestationClient);

            $form1->handleRequest($request);


        // apres submit :

            // if ($form1->isSubmitted() && $form1->isValid() && $form2->isSubmitted() && $form2->isValid()) {


            //         $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            //         $user->setPassword($password);
            //         $user->setRoles(['CLIENT']);
            //         $user->setUsername($client->getEmail());

            //         //lier user et client

            //         $client->setUser($user);

            //         // On enregistre l'utilisateur dans la base
            //         $em = $this->getDoctrine()->getManager();
            //         $em->persist($user);
            //         $em->flush();

            //         $em->persist($client);
            //         $em->flush();

            //         return $this->redirectToRoute('connexion');

            // }

        // renvoyer la page d'inscription

        return $this->render(
            'recherche/detail.html.twig',
            array('form1' => $form1->createView())
        );
    }

}
