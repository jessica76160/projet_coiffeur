<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Form\UserType;
use App\Form\ClientType;
use App\Entity\User;
use App\Entity\Client;
use App\Entity\PrestationComposee;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;
use App\Form\PrestationClientType;
use App\Entity\PrestationClient;

class ClientController extends Controller
{
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
            'client/inscription.html.twig',
            array('form1' => $form1->createView(),'form2' => $form2->createView(),'erreursClient'=>$erreursClient,'erreursUser'=>$erreursUser)
        );
    }

     /**
     * @Route("/recherche/adresse", name="recherche_adresse")
     */
    public function rechercheAdresse(Request $request ,SessionInterface $session)
    {
        $form = $this->createFormBuilder()
        ->add('perimetre', TextType::class)
        ->add('adresse', TextType::class)
        ->add('lat', HiddenType::class)
        ->add('lng', HiddenType::class)
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() ){
            $data = $form->getData();
            $session->set('adresse', $data['adresse']);
            return $this->redirectToRoute('recherche_detail');
            
        }



        return $this->render(
            'client/adresse.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueilAction(Request $request)
    {
        
        return $this->render(
            'accueil.html.twig',
            array()
        );
    }

    /**
     * @Route("/client/moncompte", name="client_moncompte")
     */
    public function moncompteAction(Request $request)
    {

        return $this->render(
            '/client/moncompte.html.twig',
            array()
        );
    }

     /**
     * @Route("/recherche/detail", name="recherche_detail")
     */

    public function rechercheDetail(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(PrestationComposee::class);
        $prestas = $repository->prestasComposees();

        return $this->render(
            'recherche/detail.html.twig',
            array('prestas'=>$prestas)
        );
    }
}
