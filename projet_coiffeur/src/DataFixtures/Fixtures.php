<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Etape;
use App\Entity\Prestation;
use App\Entity\Salon;
use App\Entity\PrestationComposee;
use App\Entity\Coiffeur;
use App\Entity\Disponibilite;
use App\Entity\Client;
use App\Entity\PrestationClient;
use App\Entity\Reservation;

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

            $salon1 = new Salon();
            $salon1->setNom('salon1');
            $salon1->setUsername('salon1');
            $salon1->setEmail('jess11590@live.fr');
            $salon1->setTelephone('0783382525');
            $salon1->setAdresse('50b rue victor hugo');
            $salon1->setCodePostale('76520');
            $salon1->setVille('franqueville-saint-pierre');
            $salon1->setPassword($this->passwordEncoder->encodePassword($salon1, 'alex181187'));
            $salon1->setNote(0);
            $salon1->setHoraire('du lundi au vendredi de 9h à 18h');

            // enregistrement de prestations

                $prestation1 = new Prestation();
                $prestation1->setNom('coloration');
                $prestation1->setDuree(60);
                $prestation1->setTarif(100);

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
                $prestationComposee1->SetNom('coupe femme');
                $prestationComposee1->SetTarif(30);
                $prestationComposee1->SetSalon($salon1);
                $prestationComposee1->AddPrestation($prestation2);

                $manager->persist($prestationComposee1);
                $manager->flush();

                $prestationComposee2=new PrestationComposee;
                $prestationComposee2->SetNom('coupe + coloration femme');
                $prestationComposee2->SetTarif(110);
                $prestationComposee2->SetSalon($salon1);
                $prestationComposee2->AddPrestation($prestation1);
                $prestationComposee2->AddPrestation($prestation2);

                $manager->persist($prestationComposee2);
                $manager->flush();

            $salon1->addPrestationsComposee($prestationComposee1);
            $salon1->addPrestationsComposee($prestationComposee2);
 
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

            $client1=new Client;
            $client1->SetNom('rolland');
            $client1->SetPrenom('jessica');
            $client1->SetEmail('jess11590@live.fr');
            $client1->SetTelephone('0783382525');
            $client1->SetAdresse('50b rue victor hugo');
            $client1->SetCodePostale('76520');
            $client1->SetVille('franqueville-saint-pierre');
            $client1->SetPassword('alex181187');

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
