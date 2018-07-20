<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Etape;
use App\Entity\Prestation;
use App\Entity\Salon;
use App\Entity\PrestationComposee;
use App\Entity\Coiffeur;
use App\Entity\Disponibilite;
use App\Entity\Client;
use App\Entity\PrestationClient;
use App\Entity\Reservation;
use App\Entity\User;

class Fixtures extends Fixture
{
    private $passwordEncoder;
 
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        // enregistrement salon ------------------------------------------------------------------------

            $user1=new User();
            $user1->setUsername('salon1');
            $user1->setPassword($this->passwordEncoder->encodePassword($user1, 'alex181187'));
            $user1->setRoles(['SALON']);

            $manager->persist($user1);
            $manager->flush();

            $salon1 = new Salon();
            $salon1->setNom('salon1');
            $salon1->setEmail('jess11590@live.fr');
            $salon1->setTelephone('0783382525');
            $salon1->setAdresse('50b rue victor hugo');
            $salon1->setCodePostale('76520');
            $salon1->setVille('franqueville-saint-pierre');
            $salon1->setNote(0);
            $salon1->setHoraire('du lundi au vendredi de 9h à 18h');
            $salon1->SetUser($user1);

            

            // enregistrement de prestations

                $prestation1 = new Prestation();
                $prestation1->setNom('shampooing');
                $prestation1->setDuree(10);
                $prestation1->setTarif(5);
                $prestation1->setGenre('commun');
                $prestation1->setTypeCheveux('commun');

                $manager->persist($prestation1);
                $manager->flush();

                $prestation2 = new Prestation();
                $prestation2->setNom('coiffure');
                $prestation2->setDuree(30);
                $prestation2->setTarif(19);
                $prestation2->setGenre('femme');
                $prestation2->setTypeCheveux('court');

                $manager->persist($prestation2);
                $manager->flush();

                $prestation3 = new Prestation();
                $prestation3->setNom('coiffure');
                $prestation3->setDuree(30);
                $prestation3->setTarif(22);
                $prestation3->setGenre('femme');
                $prestation3->setTypeCheveux('long');

                $manager->persist($prestation3);
                $manager->flush();

                $prestation4 = new Prestation();
                $prestation4->setNom('coupe');
                $prestation4->setDuree(60);
                $prestation4->setTarif(29);
                $prestation4->setGenre('femme');
                $prestation4->setTypeCheveux('court');

                $manager->persist($prestation4);
                $manager->flush();

                $prestation5 = new Prestation();
                $prestation5->setNom('coupe');
                $prestation5->setDuree(60);
                $prestation5->setTarif(33);
                $prestation5->setGenre('femme');
                $prestation5->setTypeCheveux('long');

                $manager->persist($prestation5);
                $manager->flush();

                $prestation6 = new Prestation();
                $prestation6->setNom('coupe');
                $prestation6->setDuree(30);
                $prestation6->setTarif(19);
                $prestation6->setGenre('homme');
                $prestation6->setTypeCheveux('court');

                $manager->persist($prestation6);
                $manager->flush();

                $prestation7 = new Prestation();
                $prestation7->setNom('coupe');
                $prestation7->setDuree(30);
                $prestation7->setTarif(20);
                $prestation7->setGenre('homme');
                $prestation7->setTypeCheveux('long');

                $manager->persist($prestation7);
                $manager->flush();

                $prestation8 = new Prestation();
                $prestation8->setNom('coupe');
                $prestation8->setDuree(30);
                $prestation8->setTarif(10);
                $prestation8->setGenre('enfant');
                $prestation8->setTypeCheveux('commun');

                $manager->persist($prestation8);
                $manager->flush();

                $prestation9 = new Prestation();
                $prestation9->setNom('brushing');
                $prestation9->setDuree(30);
                $prestation9->setTarif(20);
                $prestation9->setGenre('femme');
                $prestation9->setTypeCheveux('court');

                $manager->persist($prestation9);
                $manager->flush();

                $prestation10 = new Prestation();
                $prestation10->setNom('brushing');
                $prestation10->setDuree(30);
                $prestation10->setTarif(25);
                $prestation10->setGenre('femme');
                $prestation10->setTypeCheveux('long');

                $manager->persist($prestation10);
                $manager->flush();

                $prestation11 = new Prestation();
                $prestation11->setNom('couleur');
                $prestation11->setDuree(60);
                $prestation11->setTarif(35);
                $prestation11->setGenre('femme');
                $prestation11->setTypeCheveux('court');

                $manager->persist($prestation11);
                $manager->flush();

                $prestation12 = new Prestation();
                $prestation12->setNom('couleur');
                $prestation12->setDuree(60);
                $prestation12->setTarif(40);
                $prestation12->setGenre('femme');
                $prestation12->setTypeCheveux('long');

                $manager->persist($prestation12);
                $manager->flush();
                
                $prestation13 = new Prestation();
                $prestation13->setNom('couleur');
                $prestation13->setDuree(60);
                $prestation13->setTarif(35);
                $prestation13->setGenre('homme');
                $prestation13->setTypeCheveux('court');

                $manager->persist($prestation13);
                $manager->flush();

                $prestation14 = new Prestation();
                $prestation14->setNom('couleur');
                $prestation14->setDuree(60);
                $prestation14->setTarif(40);
                $prestation14->setGenre('homme');
                $prestation14->setTypeCheveux('long');

                $manager->persist($prestation14);
                $manager->flush();

                $prestation15 = new Prestation();
                $prestation15->setNom('meche');
                $prestation15->setDuree(60);
                $prestation15->setTarif(45);
                $prestation15->setGenre('femme');
                $prestation15->setTypeCheveux('court');

                $manager->persist($prestation15);
                $manager->flush();

                $prestation16 = new Prestation();
                $prestation16->setNom('meche');
                $prestation16->setDuree(60);
                $prestation16->setTarif(50);
                $prestation16->setGenre('femme');
                $prestation16->setTypeCheveux('long');

                $manager->persist($prestation16);
                $manager->flush();

                $prestation17 = new Prestation();
                $prestation17->setNom('meche');
                $prestation17->setDuree(60);
                $prestation17->setTarif(50);
                $prestation17->setGenre('homme');
                $prestation17->setTypeCheveux('long');

                $manager->persist($prestation17);
                $manager->flush();

                $prestation18 = new Prestation();
                $prestation18->setNom('balayage');
                $prestation18->setDuree(60);
                $prestation18->setTarif(40);
                $prestation18->setGenre('femme');
                $prestation18->setTypeCheveux('court');

                $manager->persist($prestation18);
                $manager->flush();

                $prestation19 = new Prestation();
                $prestation19->setNom('balayage');
                $prestation19->setDuree(60);
                $prestation19->setTarif(45);
                $prestation19->setGenre('femme');
                $prestation19->setTypeCheveux('long');

                $manager->persist($prestation19);
                $manager->flush();

                $prestation20 = new Prestation();
                $prestation20->setNom('soin');
                $prestation20->setDuree(15);
                $prestation20->setTarif(15);
                $prestation20->setGenre('commun');
                $prestation20->setTypeCheveux('commun');

                $manager->persist($prestation20);
                $manager->flush();

                $prestation21 = new Prestation();
                $prestation21->setNom('chignon');
                $prestation21->setDuree(30);
                $prestation21->setTarif(30);
                $prestation21->setGenre('femme');
                $prestation21->setTypeCheveux('long');

                $manager->persist($prestation21);
                $manager->flush();




                // enregistrement des etapes

                    $etape1=new Etape;
                    $etape1->setNom('pose coloration');
                    $etape1->setDuree(15);
                    $etape1->setRessource(true);
                    $etape1->setPrestation($prestation1);

                    $manager->persist($etape1);
                    $manager->flush();

                    $etape2=new Etape;
                    $etape2->setNom('attente coloration');
                    $etape2->setDuree(30);
                    $etape2->setRessource(false);
                    $etape2->setPrestation($prestation1);

                    $manager->persist($etape2);
                    $manager->flush();

                    $etape3=new Etape;
                    $etape3->setNom('rincage');
                    $etape3->setDuree(15);
                    $etape3->setRessource(true);
                    $etape3->setPrestation($prestation1);

                    $manager->persist($etape3);
                    $manager->flush();

                $prestation1->addEtape($etape1);
                $prestation1->addEtape($etape2);
                $prestation1->addEtape($etape3);

                $manager->persist($prestation1);
                $manager->flush();

                $prestation2 = new Prestation();
                $prestation2->setNom('coupe femme');
                $prestation2->setDuree(30);
                $prestation2->setTarif(30);

                $manager->persist($prestation2);
                $manager->flush();
                    
            // enregistrement de prestations composées (attention meme les presta simple doivent etre enregistrés en presta composé)


                $prestationComposee1=new PrestationComposee;
                $prestationComposee1->SetNom('shampooing');
                $prestationComposee1->SetTarif(5);
                $prestationComposee1->SetSalon($salon1);
                $prestationComposee1->AddPrestation($prestation1);
                $prestationComposee1->setGenre('commun');
                $prestationComposee1->setTypeCheveux('commun');

                $manager->persist($prestationComposee1);
                $manager->flush();

                $prestationComposee2=new PrestationComposee;
                $prestationComposee2->SetNom('coiffure');
                $prestationComposee2->SetTarif(19);
                $prestationComposee2->SetSalon($salon1);
                $prestationComposee2->AddPrestation($prestation2);
                $prestationComposee2->setGenre('femme');
                $prestationComposee2->setTypeCheveux('court');

                $manager->persist($prestationComposee2);
                $manager->flush();

                $prestationComposee3=new PrestationComposee;
                $prestationComposee3->SetNom('coiffure');
                $prestationComposee3->SetTarif(22);
                $prestationComposee3->SetSalon($salon1);
                $prestationComposee3->AddPrestation($prestation3);
                $prestationComposee3->setGenre('femme');
                $prestationComposee3->setTypeCheveux('long');

                $manager->persist($prestationComposee3);
                $manager->flush();


                $prestationComposee4=new PrestationComposee;
                $prestationComposee4->SetNom('coupe');
                $prestationComposee4->SetTarif(29);
                $prestationComposee4->SetSalon($salon1);
                $prestationComposee4->AddPrestation($prestation4);
                $prestationComposee4->setGenre('femme');
                $prestationComposee4->setTypeCheveux('court');

                $manager->persist($prestationComposee4);
                $manager->flush();

                $prestationComposee5=new PrestationComposee;
                $prestationComposee5->SetNom('coupe');
                $prestationComposee5->SetTarif(32);
                $prestationComposee5->SetSalon($salon1);
                $prestationComposee5->AddPrestation($prestation5);
                $prestationComposee5->setGenre('femme');
                $prestationComposee5->setTypeCheveux('long');

                $manager->persist($prestationComposee5);
                $manager->flush();

                $prestationComposee6=new PrestationComposee;
                $prestationComposee6->SetNom('coupe');
                $prestationComposee6->SetTarif(19);
                $prestationComposee6->SetSalon($salon1);
                $prestationComposee6->AddPrestation($prestation6);
                $prestationComposee6->setGenre('homme');
                $prestationComposee6->setTypeCheveux('court');

                $manager->persist($prestationComposee6);
                $manager->flush();

                $prestationComposee7=new PrestationComposee;
                $prestationComposee7->SetNom('coupe');
                $prestationComposee7->SetTarif(22);
                $prestationComposee7->SetSalon($salon1);
                $prestationComposee7->AddPrestation($prestation7);
                $prestationComposee7->setGenre('homme');
                $prestationComposee7->setTypeCheveux('long');

                $manager->persist($prestationComposee7);
                $manager->flush();

                $prestationComposee7=new PrestationComposee;
                $prestationComposee7->SetNom('coupe');
                $prestationComposee7->SetTarif(10);
                $prestationComposee7->SetSalon($salon1);
                $prestationComposee7->AddPrestation($prestation7);
                $prestationComposee7->setGenre('enfant');
                $prestationComposee7->setTypeCheveux('commun');

                $manager->persist($prestationComposee7);
                $manager->flush();

                $prestationComposee8=new PrestationComposee;
                $prestationComposee8->SetNom('soin');
                $prestationComposee8->SetTarif(10);
                $prestationComposee8->SetSalon($salon1);
                $prestationComposee8->AddPrestation($prestation20);
                $prestationComposee8->setGenre('commun');
                $prestationComposee8->setTypeCheveux('commun');

                $manager->persist($prestationComposee7);
                $manager->flush();

                $prestationComposee9=new PrestationComposee;
                $prestationComposee9->SetNom('chignon');
                $prestationComposee9->SetTarif(30);
                $prestationComposee9->SetSalon($salon1);
                $prestationComposee9->AddPrestation($prestation21);
                $prestationComposee9->setGenre('femme');
                $prestationComposee9->setTypeCheveux('long');

                $manager->persist($prestationComposee9);
                $manager->flush();

                $prestationComposee10=new PrestationComposee;
                $prestationComposee10->SetNom('shampooing + brushing femme');
                $prestationComposee10->SetTarif(110);
                $prestationComposee10->SetSalon($salon1);
                $prestationComposee10->setGenre('femme');
                $prestationComposee10->setTypeCheveux('court');
                $prestationComposee10->AddPrestation($prestation1);
                $prestationComposee10->AddPrestation($prestation9);

                $manager->persist($prestationComposee10);
                $manager->flush();

            $salon1->addPrestationsComposee($prestationComposee1);
            $salon1->addPrestationsComposee($prestationComposee2);
            $salon1->addPrestationsComposee($prestationComposee3);
            $salon1->addPrestationsComposee($prestationComposee4);
            $salon1->addPrestationsComposee($prestationComposee5);
            $salon1->addPrestationsComposee($prestationComposee6);
            $salon1->addPrestationsComposee($prestationComposee7);
            
 
            // enregistrement des coiffeurs

                $coiffeur1=new Coiffeur;
                $coiffeur1->SetNom('coiffeur1');
                $coiffeur1->SetSalon($salon1);
                $coiffeur1->addPrestationsComposee($prestationComposee2);

                $manager->persist($coiffeur1);
                $manager->flush();

                $coiffeur2=new Coiffeur;
                $coiffeur2->SetNom('coiffeur2');
                $coiffeur2->SetSalon($salon1);
                $coiffeur2->addPrestationsComposee($prestationComposee1);
                $coiffeur2->addPrestationsComposee($prestationComposee2);

                $manager->persist($coiffeur2);
                $manager->flush();

            $salon1->AddCoiffeur($coiffeur1);
            $salon1->AddCoiffeur($coiffeur2);

            $manager->persist($salon1);
            $manager->flush();

        // enregistrement dispos ------------------------------------------------------------------------------------

            $dispo1=new Disponibilite;
            $dispo1->SetDate(new \DateTime('2018-07-13'));
            $dispo1->SetHeureDebut(new \DateTime('14:30:00'));
            $dispo1->SetHeureFin(new \DateTime('15:30:00'));
            $dispo1->SetEtat('disponible');
            $dispo1->SetArchive(false);
            $dispo1->SetCoiffeur($coiffeur1);

            $manager->persist($dispo1);
            $manager->flush();

            $dispo2=new Disponibilite;
            $dispo2->SetDate(new \DateTime('2018-07-13'));
            $dispo2->SetHeureDebut(new \DateTime('14:45:00'));
            $dispo2->SetHeureFin(new \DateTime('17:30:00'));
            $dispo2->SetEtat('disponible');
            $dispo2->SetArchive(false);
            $dispo2->SetCoiffeur($coiffeur2);

            $manager->persist($dispo2);
            $manager->flush();

        
        // enregistrement des clients --------------------------------------------------------------------------------
           
            $user2=new User();
            $user2->setUsername('client1');
            $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'alex181187'));
            $user2->setRoles(['CLIENT']);

            $manager->persist($user2);
            $manager->flush();

            $client1=new Client;
            $client1->SetNom('rolland');
            $client1->SetPrenom('jessica');
            $client1->SetEmail('jess11590@live.fr');
            $client1->SetTelephone('0783382525');
            $client1->SetAdresse('50b rue victor hugo');
            $client1->SetCodePostale('76520');
            $client1->SetVille('franqueville-saint-pierre');
            $client1->SetUser($user2);

            $manager->persist($client1);
            $manager->flush();

        // enregistrement de prestations clients / reservations ---------------------------------------------------------

            $prestationClient1=new PrestationClient;
            $prestationClient1->SetHeureDebut(new \DateTime('15:00:00'));
            $prestationClient1->SetHeureFin(new \DateTime('16:30:00'));
            $prestationClient1->addPrestationsComposee($prestationComposee2);
            $prestationClient1->addPrestationsComposee($prestationComposee1);
            $prestationClient1->SetDisponibilite($dispo2);

            $manager->persist($prestationClient1);
            $manager->flush();

            $prestationClient2=new PrestationClient;
            $prestationClient2->SetHeureDebut(new \DateTime('14:40:00'));
            $prestationClient2->SetHeureFin(new \DateTime('15:10:00'));
            $prestationClient2->addPrestationsComposee($prestationComposee1);
            $prestationClient2->SetDisponibilite($dispo1);

            $manager->persist($prestationClient2);
            $manager->flush();

            // reservation

            $resa1=new Reservation;
            $resa1->SetNumero('XXX-13072018-001');
            $resa1->SetTarif(170.00);
            $resa1->setCreatedAt(new \DateTime("now"));
            $resa1->SetClient($client1);
            $resa1->addPrestationsClient($prestationClient1);
            $resa1->addPrestationsClient($prestationClient2);

            $manager->persist($resa1);
            $manager->flush();


        
    }


    
        

    

}
