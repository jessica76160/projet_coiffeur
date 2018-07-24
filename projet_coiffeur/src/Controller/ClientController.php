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
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

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
     * @Route("/recherche/adresse", name="adresse")
     */
    public function rechercheAdresse(Request $request ,SessionInterface $session)
    {
        $form = $this->createFormBuilder()
        ->add('perimetre', TextType::class)
        ->add('adresse', TextType::class,array('required' => false,))
        ->add('lat', HiddenType::class)
        ->add('lng', HiddenType::class)
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() ){
            $data = $form->getData();
            $session->set('lat', $data['lat']);
            $session->set('lng', $data['lng']);
            $session->set('perimetre', $data['perimetre']);
            return $this->redirectToRoute('personne');

        }

        



        return $this->render(
            'recherche/adresse.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/recherche/personne", name="personne")
     */
    public function personne()
    { 
        return $this->render('recherche/personne.html.twig');
    }

    /**
     * @Route("/recherche/prestation", name="prestation")
     */
    public function prestation()
    {
     
        return $this->render('recherche/prestation.html.twig');
    }

    /**
     * @Route("/recherche/resultats", name="resultats")
     */
    public function resultats(Request $request ,SessionInterface $session)
    {
        $lat = $session->get("lat");
        $lon = $session->get("lng");
        $perimetre = $session->get("perimetre");

        return $this->render('recherche/resultats.html.twig',["lat"=>$lat, "lng"=>$lon,"perimetre"=>$perimetre]);
    }

    /**
     * @Route("/salon", name="salon")
     */
    public function salon()
    {
        return $this->render('salon.html.twig');
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
     * @Route("/a_domicile/adresse", name="adresse_domicile")
     */
    public function adresse_domicile()
    {
        return $this->render('a_domicile/adresse.html.twig');
    }

    /**
     * @Route("/a_domicile/personne", name="personne_domicile")
     */
    public function personne_domicile()
    {
        return $this->render('a_domicile/personne.html.twig');
    }

    /**
     * @Route("/a_domicile/prestation", name="prestation_domicile")
     */
    public function prestation_domicile()
    {
        return $this->render('a_domicile/prestation.html.twig');
    }

    /**
     * @Route("/reservation_domicile", name="reservation_domicile")
     */
    public function reservation_domicile()
    {
        return $this->render('reservation/reservation_domicile.html.twig');
    }

    /**
     * @Route("/confirmation_domicile", name="confirmation_domicile")
     */
    public function confirmation_domicile()
    {
        return $this->render('reservation/confirmation_domicile.html.twig');
    }

    /**
     * @Route("/a_domicile/coiffeurs_disponibles", name="coiffeurs_disponibles")
     */
    public function coiffeurs_disponibles()
    {
        return $this->render('a_domicile/coiffeurs_disponibles.html.twig');
    }

    /**
     * @Route("/inscription/client", name="client_inscription")
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
            $erreurs="";



        // apres submit :

            if ($form1->isSubmitted() && $form2->isSubmitted()) {


                    $password = $passwordEncoder->encodePassword($user, $user->getPassword());
                    $user->setPassword($password);
                    $user->setRoles(['CLIENT']);
                    $user->setUsername($client->getEmail());

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
            array('form1' => $form1->createView(),'form2' => $form2->createView(),'erreurs'=>$erreurs)
        );
    }


    /**
     * @Route("/client/compte", name="compte_client")
     */

    public function compteClient(Request $request, UserPasswordEncoderInterface $passwordEncoder)
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
                    $user->setUsername($client->getEmail());

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
            'client/compte.html.twig',
            array('form1' => $form1->createView(),'form2' => $form2->createView(),'erreursClient'=>$erreursClient,'erreursUser'=>$erreursUser)
        );
    }


}
    



    // /**
    //  * @Route("/recherche/prestation", name="prestation")
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

//     public function rechercheDetail(Request $request, UserPasswordEncoderInterface $passwordEncoder)
//     {
//         // generer les formulaires

//             $prestationClient = new PrestationClient();
//             $form1 = $this->createForm(PrestationClientType::class, $prestationClient);

//             $form1->handleRequest($request);


//         // apres submit :

//             // if ($form1->isSubmitted() && $form1->isValid() && $form2->isSubmitted() && $form2->isValid()) {


//             //         $password = $passwordEncoder->encodePassword($user, $user->getPassword());
//             //         $user->setPassword($password);
//             //         $user->setRoles(['CLIENT']);
//             //         $user->setUsername($client->getEmail());

//             //         //lier user et client

//             //         $client->setUser($user);

//             //         // On enregistre l'utilisateur dans la base
//             //         $em = $this->getDoctrine()->getManager();
//             //         $em->persist($user);
//             //         $em->flush();

//             //         $em->persist($client);
//             //         $em->flush();

//             //         return $this->redirectToRoute('connexion');

//             // }

//         // renvoyer la page d'inscription

//         return $this->render(
//             'recherche/detail.html.twig',
//             array('form1' => $form1->createView())
//         );
//     }

// }
