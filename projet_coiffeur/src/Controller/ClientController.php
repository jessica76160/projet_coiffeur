<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Form\UserType;
use App\Entity\PrestationClient;
use App\Entity\PrestationComposee;
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
use Doctrine\Common\Persistence\ObjectManager;

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
        //dump($this->getUser());
        //die();
        return $this->render('accueil.html.twig');
    }

    /**
     * @Route("/recherche/adresse", name="adresse")
     */
    public function rechercheAdresse(Request $request ,SessionInterface $session)
    {
        $form = $this->createFormBuilder()
        ->add('perimetre', TextType::class, array('attr' => array('placeholder' => 'Indiquez un périmètre en km')))
        ->add('adresse', TextType::class, array('attr' => array('placeholder' => 'Indiquez une adresse'), 'required'=>false))
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
    public function personne(Request $request,SessionInterface $session, ObjectManager $manager)
    {
        $content=[];
        $liste=[];
        $html=[];
        $liste_id=[];
        $tab=[];
        $presta="";
        $iPresta=0;
        $array2=[];


        // apres submit
        if($request->request->get('rechercher')!= null){

            // traitement si submit general => sauvegarder les infos

            // sauvegarder heure

                $session->set('heure', $request->request->get('appt-time'));

            // recuperer les données et les mettres sous forme de tableau asso.
                

                $content = $request->getContent();

                $content2=explode ( '&' , $content );
                $nb_variable = count($content2);
                
                for ( $i=0; $i< $nb_variable; $i++)
                {
                    $contenu = explode("=", $content2[$i]);
                    
                    if($contenu[0]!=""){
                        $arrayFinal[$contenu[0]]=$contenu[1];
                    }else{
                        $arrayFinal=[];
                    }
                    
                }
                $tab=$arrayFinal;

            // creer une prestaclient par personne

            foreach($arrayFinal as $key=>$value){

                if(preg_match('/inputPrestas/',$key,$num)){

                    // recuperer id
                    
                        preg_match('/[0-9]/',$key,$numero);
                        $id=$numero[0];
                        $liste_id[]=$id;

                    // creer un nouvel objet prestaclient

                        $prestation[$iPresta]=new prestationClient;


                    // recuperer la valeur du select multiple

                        $select='inputPrestas'.$id;
                        $selectValeurs[]=$request->request->get($select);

                    // pour chaque id selectionné, recuperer objet

                            for ( $i=0; $i< count($selectValeurs[0]); $i++){

                                $id=$selectValeurs[0][$i];

                                // appel a la fonction

                                    $presta=$this->getDoctrine()
                                    ->getManager()
                                    ->getRepository(PrestationComposee::class)
                                    ->findOneById($id);
    
                                // insertions dans l'objet

                                    $prestation[$iPresta]->addPrestationsComposee($presta);
                                    $manager->persist($prestation[$iPresta]);

                                    $pres[$iPresta][$i]=$presta->getNom();

                                // sauvegarde de l'objet dans session

                                    $session->set('prestation['.$iPresta.']', $prestation[$iPresta]);
                        
                            }
                        

                }

               
             $iPresta++;   
            }
                  
            return $this->redirectToRoute('resultats');

        }else{

            // apres rafraichissement

            if(isset($request) and !empty($request->getContent()))
            {
                $liste=['a'];

                // recuperer les données et les mettres sous forme de tableau asso.

                $content = $request->getContent();

                $content2=explode ( '&' , $content );
                $nb_variable = count($content2);
                
                for ( $i=0; $i< $nb_variable; $i++)
                {
                    $contenu = explode("=", $content2[$i]);
                    
                    if($contenu[0]!=""){
                        $arrayFinal[$contenu[0]]=$contenu[1];
                    }else{
                        $arrayFinal=[];
                    }
                    
                }
                $tab=$arrayFinal;
                foreach($arrayFinal as $key=>$value){


                    if(preg_match('/inputGenre/',$key,$num)){

                        $array2[$key]=$value;

                        // recuperer id
                        
                        preg_match('/[0-9]/',$key,$numero);
                        $id=$numero[0];
                        $liste_id[]=$id;
        
                        // recuperer les valeurs des 2 champs correspondants
                        $typeGenre='inputGenre'.$id;
                        $typeType='inputType'.$id;
                        $genre=$arrayFinal[$typeGenre]??"";
                        $type=$arrayFinal[$typeType]??"";
        
        
                        // appel a la fonction
        
                        $liste['inputPrestas'.$id]=$this->getDoctrine()
                        ->getManager()
                        ->getRepository(PrestationComposee::class)
                        ->findByGenreType($genre,$type);

                    }elseif(preg_match('/inputPrestas/',$key,$num)){

                        //remplacer les caractere speciaux

                            $newKey=str_replace('%5B%5D','',$key);

                        //modifier dans le tableau

                             $array2[$newKey]=$value;

                            

                    }elseif(preg_match('/appt-time/',$key,$num)){

                        // remplacer les caracteres speciaux

                            $newValue=str_replace('%3A',':',$value);

                        //modifier dans le tableau

                            $array2[$key]=$newValue;

                    }else{

                        $array2[$key]=$value;
                    }
                }
            
                
            }else{

                 // si demarrage de la page

                    $genre="homme";
                    $type="court";

                    // appel a la fonction
                    
                    $liste['inputPrestas0']=$this->getDoctrine()
                    ->getManager()
                    ->getRepository(PrestationComposee::class)
                    ->findByGenreType($genre,$type);
            }
        }
       

    


        return $this->render('recherche/personne.html.twig',['contenu'=>$array2,'listeId'=>$liste_id,'liste'=>$liste,'presta'=>$presta]);

       
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
     * @Route("/client/compte", name="compte_client")
     */

    public function compteClient(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // generer les formulaires

            $user = $this->getUser();
            $form1 = $this->createForm(UserType::class, $user);
         
            $client=$this->getDoctrine()
                ->getManager()
                ->getRepository(Client::class)
                ->findOneByUser($user);
            
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

    /**
     * @Route("/email", name="email")
     */

    public function email(Request $request, \Swift_Mailer $mailer)
    {
    $message = (new \Swift_Message('Hello Email'))
        ->setFrom('guillaume.queste84@gmail.com')
        ->setTo('guillaume.queste84@gmail.com')
        ->setBody(
            $this->renderView(
                // templates/email.html.twig
                'email.html.twig'
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;
    $mailer->send($message);
    return $this->render('accueil.html.twig');
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
