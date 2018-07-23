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
                $prestation2->setDuree(10);
                $prestation2->setTarif(10);
                $prestation2->setGenre('femme');
                $prestation2->setTypeCheveux('court');

                $manager->persist($prestation2);
                $manager->flush();

                $prestation3 = new Prestation();
                $prestation3->setNom('coiffure');
                $prestation3->setDuree(30);
                $prestation3->setTarif(12);
                $prestation3->setGenre('femme');
                $prestation3->setTypeCheveux('long');

                $manager->persist($prestation3);
                $manager->flush();

                $prestation4 = new Prestation();
                $prestation4->setNom('coupe');
                $prestation4->setDuree(60);
                $prestation4->setTarif(23);
                $prestation4->setGenre('femme');
                $prestation4->setTypeCheveux('court');

                $manager->persist($prestation4);
                $manager->flush();

                $prestation5 = new Prestation();
                $prestation5->setNom('coupe');
                $prestation5->setDuree(60);
                $prestation5->setTarif(25);
                $prestation5->setGenre('femme');
                $prestation5->setTypeCheveux('long');

                $manager->persist($prestation5);
                $manager->flush();

                $prestation6 = new Prestation();
                $prestation6->setNom('coupe');
                $prestation6->setDuree(30);
                $prestation6->setTarif(18);
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
                $prestation9->setTarif(10);
                $prestation9->setGenre('femme');
                $prestation9->setTypeCheveux('court');

                $manager->persist($prestation9);
                $manager->flush();

                $prestation10 = new Prestation();
                $prestation10->setNom('brushing');
                $prestation10->setDuree(30);
                $prestation10->setTarif(15);
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
                $prestation20->setTarif(10);
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
                $prestationComposee2->SetTarif(10);
                $prestationComposee2->SetSalon($salon1);
                $prestationComposee2->AddPrestation($prestation2);
                $prestationComposee2->setGenre('femme');
                $prestationComposee2->setTypeCheveux('court');

                $manager->persist($prestationComposee2);
                $manager->flush();

                $prestationComposee3=new PrestationComposee;
                $prestationComposee3->SetNom('coiffure');
                $prestationComposee3->SetTarif(12);
                $prestationComposee3->SetSalon($salon1);
                $prestationComposee3->AddPrestation($prestation3);
                $prestationComposee3->setGenre('femme');
                $prestationComposee3->setTypeCheveux('long');

                $manager->persist($prestationComposee3);
                $manager->flush();


                $prestationComposee4=new PrestationComposee;
                $prestationComposee4->SetNom('coupe');
                $prestationComposee4->SetTarif(23);
                $prestationComposee4->SetSalon($salon1);
                $prestationComposee4->AddPrestation($prestation4);
                $prestationComposee4->setGenre('femme');
                $prestationComposee4->setTypeCheveux('court');

                $manager->persist($prestationComposee4);
                $manager->flush();

                $prestationComposee5=new PrestationComposee;
                $prestationComposee5->SetNom('coupe');
                $prestationComposee5->SetTarif(25);
                $prestationComposee5->SetSalon($salon1);
                $prestationComposee5->AddPrestation($prestation5);
                $prestationComposee5->setGenre('femme');
                $prestationComposee5->setTypeCheveux('long');

                $manager->persist($prestationComposee5);
                $manager->flush();

                $prestationComposee6=new PrestationComposee;
                $prestationComposee6->SetNom('coupe');
                $prestationComposee6->SetTarif(18);
                $prestationComposee6->SetSalon($salon1);
                $prestationComposee6->AddPrestation($prestation6);
                $prestationComposee6->setGenre('homme');
                $prestationComposee6->setTypeCheveux('court');

                $manager->persist($prestationComposee6);
                $manager->flush();

                $prestationComposee7=new PrestationComposee;
                $prestationComposee7->SetNom('coupe');
                $prestationComposee7->SetTarif(20);
                $prestationComposee7->SetSalon($salon1);
                $prestationComposee7->AddPrestation($prestation7);
                $prestationComposee7->setGenre('homme');
                $prestationComposee7->setTypeCheveux('long');

                $manager->persist($prestationComposee7);
                $manager->flush();

                $prestationComposee8=new PrestationComposee;
                $prestationComposee8->SetNom('coupe');
                $prestationComposee8->SetTarif(10);
                $prestationComposee8->SetSalon($salon1);
                $prestationComposee8->AddPrestation($prestation8);
                $prestationComposee8->setGenre('enfant');
                $prestationComposee8->setTypeCheveux('commun');

                $manager->persist($prestationComposee8);
                $manager->flush();

                $prestationComposee9=new PrestationComposee;
                $prestationComposee9->SetNom('soin');
                $prestationComposee9->SetTarif(10);
                $prestationComposee9->SetSalon($salon1);
                $prestationComposee9->AddPrestation($prestation20);
                $prestationComposee9->setGenre('commun');
                $prestationComposee9->setTypeCheveux('commun');

                $manager->persist($prestationComposee9);
                $manager->flush();

                $prestationComposee10=new PrestationComposee;
                $prestationComposee10->SetNom('chignon');
                $prestationComposee10->SetTarif(30);
                $prestationComposee10->SetSalon($salon1);
                $prestationComposee10->AddPrestation($prestation21);
                $prestationComposee10->setGenre('femme');
                $prestationComposee10->setTypeCheveux('long');

                $manager->persist($prestationComposee10);
                $manager->flush();

                $prestationComposee11=new PrestationComposee;
                $prestationComposee11->SetNom('shampooing + brushing');
                $prestationComposee11->SetTarif(15);
                $prestationComposee11->SetSalon($salon1);
                $prestationComposee11->setGenre('femme');
                $prestationComposee11->setTypeCheveux('court');
                $prestationComposee11->AddPrestation($prestation1);
                $prestationComposee11->AddPrestation($prestation9);

                $manager->persist($prestationComposee11);
                $manager->flush();

                $prestationComposee12=new PrestationComposee;
                $prestationComposee12->SetNom('shampooing + brushing');
                $prestationComposee12->SetTarif(20);
                $prestationComposee12->SetSalon($salon1);
                $prestationComposee12->setGenre('femme');
                $prestationComposee12->setTypeCheveux('long');
                $prestationComposee12->AddPrestation($prestation1);
                $prestationComposee12->AddPrestation($prestation10);

                $manager->persist($prestationComposee12);
                $manager->flush();

                $prestationComposee13=new PrestationComposee;
                $prestationComposee13->SetNom('coupe + brushing');
                $prestationComposee13->SetTarif(33);
                $prestationComposee13->SetSalon($salon1);
                $prestationComposee13->setGenre('femme');
                $prestationComposee13->setTypeCheveux('court');
                $prestationComposee13->AddPrestation($prestation4);
                $prestationComposee13->AddPrestation($prestation9);

                $manager->persist($prestationComposee13);
                $manager->flush();

                $prestationComposee14=new PrestationComposee;
                $prestationComposee14->SetNom('coupe + brushing');
                $prestationComposee14->SetTarif(40);
                $prestationComposee14->SetSalon($salon1);
                $prestationComposee14->setGenre('femme');
                $prestationComposee14->setTypeCheveux('long');
                $prestationComposee14->AddPrestation($prestation5);
                $prestationComposee14->AddPrestation($prestation10);

                $manager->persist($prestationComposee14);
                $manager->flush();

                $prestationComposee15=new PrestationComposee;
                $prestationComposee15->SetNom('shampooing + coupe + brushing');
                $prestationComposee15->SetTarif(38);
                $prestationComposee15->SetSalon($salon1);
                $prestationComposee15->setGenre('femme');
                $prestationComposee15->setTypeCheveux('court');
                $prestationComposee15->AddPrestation($prestation1);
                $prestationComposee15->AddPrestation($prestation4);
                $prestationComposee15->AddPrestation($prestation9);

                $manager->persist($prestationComposee15);
                $manager->flush();
                 
                $prestationComposee16=new PrestationComposee;
                $prestationComposee16->SetNom('shampooing + coupe + brushing');
                $prestationComposee16->SetTarif(45);
                $prestationComposee16->SetSalon($salon1);
                $prestationComposee16->setGenre('femme');
                $prestationComposee16->setTypeCheveux('long');
                $prestationComposee16->AddPrestation($prestation1);
                $prestationComposee16->AddPrestation($prestation5);
                $prestationComposee16->AddPrestation($prestation10);

                $manager->persist($prestationComposee16);
                $manager->flush();

                $prestationComposee17=new PrestationComposee;
                $prestationComposee17->SetNom('shampooing + coupe');
                $prestationComposee17->SetTarif(28);
                $prestationComposee17->SetSalon($salon1);
                $prestationComposee17->setGenre('femme');
                $prestationComposee17->setTypeCheveux('court');
                $prestationComposee17->AddPrestation($prestation1);
                $prestationComposee17->AddPrestation($prestation4);

                $manager->persist($prestationComposee17);
                $manager->flush();

                $prestationComposee18=new PrestationComposee;
                $prestationComposee18->SetNom('shampooing + coupe');
                $prestationComposee18->SetTarif(30);
                $prestationComposee18->SetSalon($salon1);
                $prestationComposee18->setGenre('femme');
                $prestationComposee18->setTypeCheveux('long');
                $prestationComposee18->AddPrestation($prestation1);
                $prestationComposee18->AddPrestation($prestation5);

                $manager->persist($prestationComposee18);
                $manager->flush();

                $prestationComposee19=new PrestationComposee;
                $prestationComposee19->SetNom('shampooing + coupe');
                $prestationComposee19->SetTarif(23);
                $prestationComposee19->SetSalon($salon1);
                $prestationComposee19->setGenre('homme');
                $prestationComposee19->setTypeCheveux('court');
                $prestationComposee19->AddPrestation($prestation1);
                $prestationComposee19->AddPrestation($prestation6);

                $manager->persist($prestationComposee19);
                $manager->flush();

                $prestationComposee20=new PrestationComposee;
                $prestationComposee20->SetNom('shampooing + coupe');
                $prestationComposee20->SetTarif(25);
                $prestationComposee20->SetSalon($salon1);
                $prestationComposee20->setGenre('homme');
                $prestationComposee20->setTypeCheveux('long');
                $prestationComposee20->AddPrestation($prestation1);
                $prestationComposee20->AddPrestation($prestation7);

                $manager->persist($prestationComposee20);
                $manager->flush();

                $prestationComposee21=new PrestationComposee;
                $prestationComposee21->SetNom('shampooing + coupe');
                $prestationComposee21->SetTarif(15);
                $prestationComposee21->SetSalon($salon1);
                $prestationComposee21->setGenre('enfant');
                $prestationComposee21->setTypeCheveux('commun');
                $prestationComposee21->AddPrestation($prestation1);
                $prestationComposee21->AddPrestation($prestation8);

                $manager->persist($prestationComposee21);
                $manager->flush();

                $prestationComposee22=new PrestationComposee;
                $prestationComposee22->SetNom('shampooing + couleur + brushing');
                $prestationComposee22->SetTarif(50);
                $prestationComposee22->SetSalon($salon1);
                $prestationComposee22->setGenre('femme');
                $prestationComposee22->setTypeCheveux('court');
                $prestationComposee22->AddPrestation($prestation1);
                $prestationComposee22->AddPrestation($prestation11);
                $prestationComposee22->AddPrestation($prestation9);

                $manager->persist($prestationComposee22);
                $manager->flush();

                $prestationComposee23=new PrestationComposee;
                $prestationComposee23->SetNom('shampooing + couleur + brushing');
                $prestationComposee23->SetTarif(60);
                $prestationComposee23->SetSalon($salon1);
                $prestationComposee23->setGenre('femme');
                $prestationComposee23->setTypeCheveux('long');
                $prestationComposee23->AddPrestation($prestation1);
                $prestationComposee23->AddPrestation($prestation12);
                $prestationComposee23->AddPrestation($prestation10);

                $manager->persist($prestationComposee23);
                $manager->flush();

                $prestationComposee24=new PrestationComposee;
                $prestationComposee24->SetNom('shampooing + couleur');
                $prestationComposee24->SetTarif(40);
                $prestationComposee24->SetSalon($salon1);
                $prestationComposee24->setGenre('homme');
                $prestationComposee24->setTypeCheveux('court');
                $prestationComposee24->AddPrestation($prestation1);
                $prestationComposee24->AddPrestation($prestation13);

                $manager->persist($prestationComposee24);
                $manager->flush();

                $prestationComposee21=new PrestationComposee;
                $prestationComposee21->SetNom('shampooing + couleur');
                $prestationComposee21->SetTarif(45);
                $prestationComposee21->SetSalon($salon1);
                $prestationComposee21->setGenre('homme');
                $prestationComposee21->setTypeCheveux('long');
                $prestationComposee21->AddPrestation($prestation1);
                $prestationComposee21->AddPrestation($prestation14);

                $manager->persist($prestationComposee21);
                $manager->flush();

                $prestationComposee22=new PrestationComposee;
                $prestationComposee22->SetNom('shampooing + coupe + couleur + brushing');
                $prestationComposee22->SetTarif(73);
                $prestationComposee22->SetSalon($salon1);
                $prestationComposee22->setGenre('femme');
                $prestationComposee22->setTypeCheveux('court');
                $prestationComposee22->AddPrestation($prestation1);
                $prestationComposee22->AddPrestation($prestation4);
                $prestationComposee22->AddPrestation($prestation11);
                $prestationComposee22->AddPrestation($prestation9);

                $manager->persist($prestationComposee22);
                $manager->flush();

                $prestationComposee23=new PrestationComposee;
                $prestationComposee23->SetNom('shampooing + coupe + couleur + brushing');
                $prestationComposee23->SetTarif(85);
                $prestationComposee23->SetSalon($salon1);
                $prestationComposee23->setGenre('femme');
                $prestationComposee23->setTypeCheveux('long');
                $prestationComposee23->AddPrestation($prestation1);
                $prestationComposee23->AddPrestation($prestation5);
                $prestationComposee23->AddPrestation($prestation12);
                $prestationComposee23->AddPrestation($prestation10);

                $manager->persist($prestationComposee23);
                $manager->flush();

                $prestationComposee24=new PrestationComposee;
                $prestationComposee24->SetNom('shampooing + coupe + couleur');
                $prestationComposee24->SetTarif(58);
                $prestationComposee24->SetSalon($salon1);
                $prestationComposee24->setGenre('homme');
                $prestationComposee24->setTypeCheveux('court');
                $prestationComposee24->AddPrestation($prestation1);
                $prestationComposee24->AddPrestation($prestation6);
                $prestationComposee24->AddPrestation($prestation13);

                $manager->persist($prestationComposee24);
                $manager->flush();

                $prestationComposee25=new PrestationComposee;
                $prestationComposee25->SetNom('shampooing + coupe + couleur');
                $prestationComposee25->SetTarif(65);
                $prestationComposee25->SetSalon($salon1);
                $prestationComposee25->setGenre('homme');
                $prestationComposee25->setTypeCheveux('long');
                $prestationComposee25->AddPrestation($prestation1);
                $prestationComposee25->AddPrestation($prestation7);
                $prestationComposee25->AddPrestation($prestation14);

                $manager->persist($prestationComposee25);
                $manager->flush();

                $prestationComposee26=new PrestationComposee;
                $prestationComposee26->SetNom('shampooing + meche + brushing');
                $prestationComposee26->SetTarif(60);
                $prestationComposee26->SetSalon($salon1);
                $prestationComposee26->setGenre('femme');
                $prestationComposee26->setTypeCheveux('court');
                $prestationComposee26->AddPrestation($prestation1);
                $prestationComposee26->AddPrestation($prestation15);
                $prestationComposee26->AddPrestation($prestation9);

                $manager->persist($prestationComposee26);
                $manager->flush();

                $prestationComposee27=new PrestationComposee;
                $prestationComposee27->SetNom('shampooing + meche + brushing');
                $prestationComposee27->SetTarif(70);
                $prestationComposee27->SetSalon($salon1);
                $prestationComposee27->setGenre('femme');
                $prestationComposee27->setTypeCheveux('long');
                $prestationComposee27->AddPrestation($prestation1);
                $prestationComposee27->AddPrestation($prestation16);
                $prestationComposee27->AddPrestation($prestation10);

                $manager->persist($prestationComposee27);
                $manager->flush();

                $prestationComposee28=new PrestationComposee;
                $prestationComposee28->SetNom('shampooing + coupe + meche + brushing');
                $prestationComposee28->SetTarif(83);
                $prestationComposee28->SetSalon($salon1);
                $prestationComposee28->setGenre('femme');
                $prestationComposee28->setTypeCheveux('court');
                $prestationComposee28->AddPrestation($prestation1);
                $prestationComposee28->AddPrestation($prestation4);
                $prestationComposee28->AddPrestation($prestation15);
                $prestationComposee28->AddPrestation($prestation9);

                $manager->persist($prestationComposee28);
                $manager->flush();

                $prestationComposee29=new PrestationComposee;
                $prestationComposee29->SetNom('shampooing + coupe + meche + brushing');
                $prestationComposee29->SetTarif(95);
                $prestationComposee29->SetSalon($salon1);
                $prestationComposee29->setGenre('femme');
                $prestationComposee29->setTypeCheveux('long');
                $prestationComposee29->AddPrestation($prestation1);
                $prestationComposee29->AddPrestation($prestation5);
                $prestationComposee29->AddPrestation($prestation16);
                $prestationComposee29->AddPrestation($prestation10);

                $manager->persist($prestationComposee29);
                $manager->flush();

                $prestationComposee30=new PrestationComposee;
                $prestationComposee30->SetNom('shampooing + couleur + meche + brushing');
                $prestationComposee30->SetTarif(95);
                $prestationComposee30->SetSalon($salon1);
                $prestationComposee30->setGenre('femme');
                $prestationComposee30->setTypeCheveux('court');
                $prestationComposee30->AddPrestation($prestation1);
                $prestationComposee30->AddPrestation($prestation11);
                $prestationComposee30->AddPrestation($prestation15);
                $prestationComposee30->AddPrestation($prestation9);

                $manager->persist($prestationComposee30);
                $manager->flush();

                $prestationComposee31=new PrestationComposee;
                $prestationComposee31->SetNom('shampooing + couleur + meche + brushing');
                $prestationComposee31->SetTarif(110);
                $prestationComposee31->SetSalon($salon1);
                $prestationComposee31->setGenre('femme');
                $prestationComposee31->setTypeCheveux('long');
                $prestationComposee31->AddPrestation($prestation1);
                $prestationComposee31->AddPrestation($prestation12);
                $prestationComposee31->AddPrestation($prestation16);
                $prestationComposee31->AddPrestation($prestation10);

                $manager->persist($prestationComposee31);
                $manager->flush();


                $prestationComposee32=new PrestationComposee;
                $prestationComposee32->SetNom('shampooing + coupe + couleur + meche + brushing');
                $prestationComposee32->SetTarif(118);
                $prestationComposee32->SetSalon($salon1);
                $prestationComposee32->setGenre('femme');
                $prestationComposee32->setTypeCheveux('court');
                $prestationComposee32->AddPrestation($prestation1);
                $prestationComposee32->AddPrestation($prestation4);
                $prestationComposee32->AddPrestation($prestation11);
                $prestationComposee32->AddPrestation($prestation15);
                $prestationComposee32->AddPrestation($prestation9);

                $manager->persist($prestationComposee32);
                $manager->flush();

                $prestationComposee33=new PrestationComposee;
                $prestationComposee33->SetNom('shampooing + coupe + couleur + meche + brushing');
                $prestationComposee33->SetTarif(135);
                $prestationComposee33->SetSalon($salon1);
                $prestationComposee33->setGenre('femme');
                $prestationComposee33->setTypeCheveux('long');
                $prestationComposee33->AddPrestation($prestation1);
                $prestationComposee33->AddPrestation($prestation5);
                $prestationComposee33->AddPrestation($prestation12);
                $prestationComposee33->AddPrestation($prestation16);
                $prestationComposee33->AddPrestation($prestation10);

                $manager->persist($prestationComposee33);
                $manager->flush();

                

            $salon1->addPrestationsComposee($prestationComposee1);
            $salon1->addPrestationsComposee($prestationComposee2);
            $salon1->addPrestationsComposee($prestationComposee3);
            $salon1->addPrestationsComposee($prestationComposee4);
            $salon1->addPrestationsComposee($prestationComposee5);
            $salon1->addPrestationsComposee($prestationComposee6);
            $salon1->addPrestationsComposee($prestationComposee7);
            $salon1->addPrestationsComposee($prestationComposee8);
            $salon1->addPrestationsComposee($prestationComposee9);
            $salon1->addPrestationsComposee($prestationComposee10);
            $salon1->addPrestationsComposee($prestationComposee11);
            $salon1->addPrestationsComposee($prestationComposee12);
            $salon1->addPrestationsComposee($prestationComposee13);
            $salon1->addPrestationsComposee($prestationComposee14);
            $salon1->addPrestationsComposee($prestationComposee15);
            $salon1->addPrestationsComposee($prestationComposee16);
            $salon1->addPrestationsComposee($prestationComposee17);
            $salon1->addPrestationsComposee($prestationComposee18);
            $salon1->addPrestationsComposee($prestationComposee19);
            $salon1->addPrestationsComposee($prestationComposee20);
            $salon1->addPrestationsComposee($prestationComposee21);
            $salon1->addPrestationsComposee($prestationComposee22);
            $salon1->addPrestationsComposee($prestationComposee23);
            $salon1->addPrestationsComposee($prestationComposee24);
            $salon1->addPrestationsComposee($prestationComposee25);
            $salon1->addPrestationsComposee($prestationComposee26);
            $salon1->addPrestationsComposee($prestationComposee27);
            $salon1->addPrestationsComposee($prestationComposee28);
            $salon1->addPrestationsComposee($prestationComposee29);
            $salon1->addPrestationsComposee($prestationComposee30);
            $salon1->addPrestationsComposee($prestationComposee31);
            $salon1->addPrestationsComposee($prestationComposee32);
            $salon1->addPrestationsComposee($prestationComposee33);

 
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

        // enregistrement dispos -----------------------

            $dispo1=new Disponibilite;
            $dispo1->SetDate(new \DateTime('2018-07-13'));
            $dispo1->SetHeureDebut(new \DateTime('09:00:00'));
            $dispo1->SetHeureFin(new \DateTime('10:00:00'));
            $dispo1->SetEtat('disponible');
            $dispo1->SetArchive(false);
            $dispo1->SetCoiffeur($coiffeur1);

            $manager->persist($dispo1);
            $manager->flush();

            $dispo2=new Disponibilite;
            $dispo2->SetDate(new \DateTime('2018-07-13'));
            $dispo2->SetHeureDebut(new \DateTime('11:30:00'));
            $dispo2->SetHeureFin(new \DateTime('13:00:00'));
            $dispo2->SetEtat('disponible');
            $dispo2->SetArchive(false);
            $dispo2->SetCoiffeur($coiffeur1);

            $manager->persist($dispo2);
            $manager->flush();

            $dispo3=new Disponibilite;
            $dispo3->SetDate(new \DateTime('2018-07-13'));
            $dispo3->SetHeureDebut(new \DateTime('15:30:00'));
            $dispo3->SetHeureFin(new \DateTime('17:00:00'));
            $dispo3->SetEtat('disponible');
            $dispo3->SetArchive(false);
            $dispo3->SetCoiffeur($coiffeur1);

            $manager->persist($dispo3);
            $manager->flush();

            $dispo4=new Disponibilite;
            $dispo4->SetDate(new \DateTime('2018-07-13'));
            $dispo4->SetHeureDebut(new \DateTime('09:00:00'));
            $dispo4->SetHeureFin(new \DateTime('10:00:00'));
            $dispo4->SetEtat('disponible');
            $dispo4->SetArchive(false);
            $dispo4->SetCoiffeur($coiffeur2);

            $manager->persist($dispo4);
            $manager->flush();

            $dispo5=new Disponibilite;
            $dispo5->SetDate(new \DateTime('2018-07-13'));
            $dispo5->SetHeureDebut(new \DateTime('15:00:00'));
            $dispo5->SetHeureFin(new \DateTime('17:00:00'));
            $dispo5->SetEtat('disponible');
            $dispo5->SetArchive(false);
            $dispo5->SetCoiffeur($coiffeur2);

            $manager->persist($dispo5);
            $manager->flush();

        
        // enregistrement des clients ------------------
           
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

        // enregistrement de prestations clients / reservations ---------

            $prestationClient1=new PrestationClient;
            $prestationClient1->SetHeureDebut(new \DateTime('12:00:00'));
            $prestationClient1->SetHeureFin(new \DateTime('13:00:00'));
            $prestationClient1->addPrestationsComposee($prestationComposee2);
            $prestationClient1->addPrestationsComposee($prestationComposee1);
            $prestationClient1->SetDisponibilite($dispo2);

            $manager->persist($prestationClient1);
            $manager->flush();

            $prestationClient2=new PrestationClient;
            $prestationClient2->SetHeureDebut(new \DateTime('9:00:00'));
            $prestationClient2->SetHeureFin(new \DateTime('10:00:00'));
            $prestationClient2->addPrestationsComposee($prestationComposee2);
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


            $manager->persist($resa1);
            $manager->flush();

            $resa2=new Reservation;
            $resa2->SetNumero('XXX-13072018-002');
            $resa2->SetTarif(170.00);
            $resa2->setCreatedAt(new \DateTime("now"));
            $resa2->SetClient($client1);
            $resa2->addPrestationsClient($prestationClient2);

            $manager->persist($resa2);
            $manager->flush();














        // salon numero 2 (sans prestations meches et balayages )--------------------------------------------------------------------------


            $user3=new User();
            $user3->setUsername('salon2');
            $user3->setPassword($this->passwordEncoder->encodePassword($user3, 'jeansalon'));
            $user3->setRoles(['SALON']);

            $manager->persist($user3);
            $manager->flush();

            $salon2 = new Salon();
            $salon2->setNom('salon2');
            $salon2->setEmail('jean@live.fr');
            $salon2->setTelephone('0783382525');
            $salon2->setAdresse('5 rue villiers de l\'isle adam');
            $salon2->setCodePostale('60000');
            $salon2->setVille('beauvais');
            $salon2->setNote(0);
            $salon2->setHoraire('du mardi au samedi de 9h à 18h');
            $salon2->SetUser($user2);

            

            // enregistrement de prestations

                $prestation22 = new Prestation();
                $prestation22->setNom('shampooing');
                $prestation22->setDuree(10);
                $prestation22->setTarif(5);
                $prestation22->setGenre('commun');
                $prestation22->setTypeCheveux('commun');

                $manager->persist($prestation22);
                $manager->flush();

                $prestation23 = new Prestation();
                $prestation23->setNom('coiffure');
                $prestation23->setDuree(10);
                $prestation23->setTarif(8);
                $prestation23->setGenre('femme');
                $prestation23->setTypeCheveux('court');

                $manager->persist($prestation23);
                $manager->flush();

                $prestation24 = new Prestation();
                $prestation24->setNom('coiffure');
                $prestation24->setDuree(30);
                $prestation24->setTarif(10);
                $prestation24->setGenre('femme');
                $prestation24->setTypeCheveux('long');

                $manager->persist($prestation24);
                $manager->flush();

                $prestation25 = new Prestation();
                $prestation25->setNom('coupe');
                $prestation25->setDuree(60);
                $prestation25->setTarif(20);
                $prestation25->setGenre('femme');
                $prestation25->setTypeCheveux('court');

                $manager->persist($prestation25);
                $manager->flush();

                $prestation26 = new Prestation();
                $prestation26->setNom('coupe');
                $prestation26->setDuree(60);
                $prestation26->setTarif(22);
                $prestation26->setGenre('femme');
                $prestation26->setTypeCheveux('long');

                $manager->persist($prestation26);
                $manager->flush();

                $prestation27 = new Prestation();
                $prestation27->setNom('coupe');
                $prestation27->setDuree(30);
                $prestation27->setTarif(15);
                $prestation27->setGenre('homme');
                $prestation27->setTypeCheveux('court');

                $manager->persist($prestation27);
                $manager->flush();

                $prestation28 = new Prestation();
                $prestation28->setNom('coupe');
                $prestation28->setDuree(30);
                $prestation28->setTarif(18);
                $prestation28->setGenre('homme');
                $prestation28->setTypeCheveux('long');

                $manager->persist($prestation28);
                $manager->flush();

                $prestation29 = new Prestation();
                $prestation29->setNom('coupe');
                $prestation29->setDuree(30);
                $prestation29->setTarif(8);
                $prestation29->setGenre('enfant');
                $prestation29->setTypeCheveux('commun');

                $manager->persist($prestation29);
                $manager->flush();

                $prestation30 = new Prestation();
                $prestation30->setNom('brushing');
                $prestation30->setDuree(30);
                $prestation30->setTarif(8);
                $prestation30->setGenre('femme');
                $prestation30->setTypeCheveux('court');

                $manager->persist($prestation30);
                $manager->flush();

                $prestation31 = new Prestation();
                $prestation31->setNom('brushing');
                $prestation31->setDuree(30);
                $prestation31->setTarif(12);
                $prestation31->setGenre('femme');
                $prestation31->setTypeCheveux('long');

                $manager->persist($prestation31);
                $manager->flush();

                $prestation32 = new Prestation();
                $prestation32->setNom('couleur');
                $prestation32->setDuree(60);
                $prestation32->setTarif(30);
                $prestation32->setGenre('femme');
                $prestation32->setTypeCheveux('court');

                $manager->persist($prestation32);
                $manager->flush();

                $prestation33 = new Prestation();
                $prestation33->setNom('couleur');
                $prestation33->setDuree(60);
                $prestation33->setTarif(35);
                $prestation33->setGenre('femme');
                $prestation33->setTypeCheveux('long');

                $manager->persist($prestation33);
                $manager->flush();
                
                $prestation34 = new Prestation();
                $prestation34->setNom('couleur');
                $prestation34->setDuree(60);
                $prestation34->setTarif(30);
                $prestation34->setGenre('homme');
                $prestation34->setTypeCheveux('court');

                $manager->persist($prestation34);
                $manager->flush();

                $prestation35 = new Prestation();
                $prestation35->setNom('couleur');
                $prestation35->setDuree(60);
                $prestation35->setTarif(35);
                $prestation35->setGenre('homme');
                $prestation35->setTypeCheveux('long');

                $manager->persist($prestation35);
                $manager->flush();

                $prestation36 = new Prestation();
                $prestation36->setNom('meche');
                $prestation36->setDuree(60);
                $prestation36->setTarif(40);
                $prestation36->setGenre('femme');
                $prestation36->setTypeCheveux('court');

                $manager->persist($prestation36);
                $manager->flush();

                $prestation37 = new Prestation();
                $prestation37->setNom('meche');
                $prestation37->setDuree(60);
                $prestation37->setTarif(45);
                $prestation37->setGenre('femme');
                $prestation37->setTypeCheveux('long');

                $manager->persist($prestation37);
                $manager->flush();

                $prestation38 = new Prestation();
                $prestation38->setNom('meche');
                $prestation38->setDuree(60);
                $prestation38->setTarif(40);
                $prestation38->setGenre('homme');
                $prestation38->setTypeCheveux('long');

                $manager->persist($prestation38);
                $manager->flush();

                $prestation39 = new Prestation();
                $prestation39->setNom('balayage');
                $prestation39->setDuree(60);
                $prestation39->setTarif(35);
                $prestation39->setGenre('femme');
                $prestation39->setTypeCheveux('court');

                $manager->persist($prestation39);
                $manager->flush();

                $prestation40 = new Prestation();
                $prestation40->setNom('balayage');
                $prestation40->setDuree(60);
                $prestation40->setTarif(40);
                $prestation40->setGenre('femme');
                $prestation40->setTypeCheveux('long');

                $manager->persist($prestation40);
                $manager->flush();

                $prestation41 = new Prestation();
                $prestation41->setNom('soin');
                $prestation41->setDuree(15);
                $prestation41->setTarif(8);
                $prestation41->setGenre('commun');
                $prestation41->setTypeCheveux('commun');

                $manager->persist($prestation41);
                $manager->flush();

                $prestation42 = new Prestation();
                $prestation42->setNom('chignon');
                $prestation42->setDuree(30);
                $prestation42->setTarif(30);
                $prestation42->setGenre('femme');
                $prestation42->setTypeCheveux('long');

                $manager->persist($prestation42);
                $manager->flush();

                $prestation43 = new Prestation();
                $prestation43->setNom('lissage bresilien');
                $prestation43->setDuree(180);
                $prestation43->setTarif(200);
                $prestation43->setGenre('femme');
                $prestation43->setTypeCheveux('long');

                $manager->persist($prestation43);
                $manager->flush();

                $prestation44 = new Prestation();
                $prestation44->setNom('lissage japonnais');
                $prestation44->setDuree(120);
                $prestation44->setTarif(300);
                $prestation44->setGenre('femme');
                $prestation44->setTypeCheveux('long');

                $manager->persist($prestation44);
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


                $prestationComposee34=new PrestationComposee;
                $prestationComposee34->SetNom('shampooing');
                $prestationComposee34->SetTarif(5);
                $prestationComposee34->SetSalon($salon2);
                $prestationComposee34->AddPrestation($prestation22);
                $prestationComposee34->setGenre('commun');
                $prestationComposee34->setTypeCheveux('commun');

                $manager->persist($prestationComposee34);
                $manager->flush();

                $prestationComposee35=new PrestationComposee;
                $prestationComposee35->SetNom('coiffure');
                $prestationComposee35->SetTarif(8);
                $prestationComposee35->SetSalon($salon2);
                $prestationComposee35->AddPrestation($prestation23);
                $prestationComposee35->setGenre('femme');
                $prestationComposee35->setTypeCheveux('court');

                $manager->persist($prestationComposee35);
                $manager->flush();

                $prestationComposee36=new PrestationComposee;
                $prestationComposee36->SetNom('coiffure');
                $prestationComposee36->SetTarif(10);
                $prestationComposee36->SetSalon($salon2);
                $prestationComposee36->AddPrestation($prestation24);
                $prestationComposee36->setGenre('femme');
                $prestationComposee36->setTypeCheveux('long');

                $manager->persist($prestationComposee36);
                $manager->flush();


                $prestationComposee37=new PrestationComposee;
                $prestationComposee37->SetNom('coupe');
                $prestationComposee37->SetTarif(20);
                $prestationComposee37->SetSalon($salon2);
                $prestationComposee37->AddPrestation($prestation25);
                $prestationComposee37->setGenre('femme');
                $prestationComposee37->setTypeCheveux('court');

                $manager->persist($prestationComposee37);
                $manager->flush();

                $prestationComposee38=new PrestationComposee;
                $prestationComposee38->SetNom('coupe');
                $prestationComposee38->SetTarif(22);
                $prestationComposee38->SetSalon($salon2);
                $prestationComposee38->AddPrestation($prestation26);
                $prestationComposee38->setGenre('femme');
                $prestationComposee38->setTypeCheveux('long');

                $manager->persist($prestationComposee38);
                $manager->flush();

                $prestationComposee39=new PrestationComposee;
                $prestationComposee39->SetNom('coupe');
                $prestationComposee39->SetTarif(15);
                $prestationComposee39->SetSalon($salon2);
                $prestationComposee39->AddPrestation($prestation27);
                $prestationComposee39->setGenre('homme');
                $prestationComposee39->setTypeCheveux('court');

                $manager->persist($prestationComposee39);
                $manager->flush();

                $prestationComposee40=new PrestationComposee;
                $prestationComposee40->SetNom('coupe');
                $prestationComposee40->SetTarif(18);
                $prestationComposee40->SetSalon($salon2);
                $prestationComposee40->AddPrestation($prestation28);
                $prestationComposee40->setGenre('homme');
                $prestationComposee40->setTypeCheveux('long');

                $manager->persist($prestationComposee40);
                $manager->flush();

                $prestationComposee41=new PrestationComposee;
                $prestationComposee41->SetNom('coupe');
                $prestationComposee41->SetTarif(8);
                $prestationComposee41->SetSalon($salon2);
                $prestationComposee41->AddPrestation($prestation29);
                $prestationComposee41->setGenre('enfant');
                $prestationComposee41->setTypeCheveux('commun');

                $manager->persist($prestationComposee41);
                $manager->flush();

                $prestationComposee42=new PrestationComposee;
                $prestationComposee42->SetNom('soin');
                $prestationComposee42->SetTarif(8);
                $prestationComposee42->SetSalon($salon2);
                $prestationComposee42->AddPrestation($prestation41);
                $prestationComposee42->setGenre('commun');
                $prestationComposee42->setTypeCheveux('commun');

                $manager->persist($prestationComposee42);
                $manager->flush();

                $prestationComposee43=new PrestationComposee;
                $prestationComposee43->SetNom('chignon');
                $prestationComposee43->SetTarif(30);
                $prestationComposee43->SetSalon($salon2);
                $prestationComposee43->AddPrestation($prestation42);
                $prestationComposee43->setGenre('femme');
                $prestationComposee43->setTypeCheveux('long');

                $manager->persist($prestationComposee43);
                $manager->flush();

                $prestationComposee44=new PrestationComposee;
                $prestationComposee44->SetNom('lissage bresilien');
                $prestationComposee44->SetTarif(180);
                $prestationComposee44->SetSalon($salon2);
                $prestationComposee44->AddPrestation($prestation43);
                $prestationComposee44->setGenre('femme');
                $prestationComposee44->setTypeCheveux('long');

                $manager->persist($prestationComposee44);
                $manager->flush();

                $prestationComposee45=new PrestationComposee;
                $prestationComposee45->SetNom('lissage japonnais');
                $prestationComposee45->SetTarif(300);
                $prestationComposee45->SetSalon($salon2);
                $prestationComposee45->AddPrestation($prestation44);
                $prestationComposee45->setGenre('femme');
                $prestationComposee45->setTypeCheveux('long');

                $manager->persist($prestationComposee45);
                $manager->flush();

                $prestationComposee46=new PrestationComposee;
                $prestationComposee46->SetNom('shampooing + brushing');
                $prestationComposee46->SetTarif(13);
                $prestationComposee46->SetSalon($salon2);
                $prestationComposee46->setGenre('femme');
                $prestationComposee46->setTypeCheveux('court');
                $prestationComposee46->AddPrestation($prestation22);
                $prestationComposee46->AddPrestation($prestation30);

                $manager->persist($prestationComposee46);
                $manager->flush();

                $prestationComposee47=new PrestationComposee;
                $prestationComposee47->SetNom('shampooing + brushing');
                $prestationComposee47->SetTarif(17);
                $prestationComposee47->SetSalon($salon2);
                $prestationComposee47->setGenre('femme');
                $prestationComposee47->setTypeCheveux('long');
                $prestationComposee47->AddPrestation($prestation22);
                $prestationComposee47->AddPrestation($prestation31);

                $manager->persist($prestationComposee47);
                $manager->flush();

                $prestationComposee48=new PrestationComposee;
                $prestationComposee48->SetNom('coupe + brushing');
                $prestationComposee48->SetTarif(28);
                $prestationComposee48->SetSalon($salon2);
                $prestationComposee48->setGenre('femme');
                $prestationComposee48->setTypeCheveux('court');
                $prestationComposee48->AddPrestation($prestation25);
                $prestationComposee48->AddPrestation($prestation30);

                $manager->persist($prestationComposee48);
                $manager->flush();

                $prestationComposee49=new PrestationComposee;
                $prestationComposee49->SetNom('coupe + brushing');
                $prestationComposee49->SetTarif(34);
                $prestationComposee49->SetSalon($salon2);
                $prestationComposee49->setGenre('femme');
                $prestationComposee49->setTypeCheveux('long');
                $prestationComposee49->AddPrestation($prestation26);
                $prestationComposee49->AddPrestation($prestation31);

                $manager->persist($prestationComposee49);
                $manager->flush();

                $prestationComposee50=new PrestationComposee;
                $prestationComposee50->SetNom('shampooing + coupe + brushing');
                $prestationComposee50->SetTarif(33);
                $prestationComposee50->SetSalon($salon2);
                $prestationComposee50->setGenre('femme');
                $prestationComposee50->setTypeCheveux('court');
                $prestationComposee50->AddPrestation($prestation22);
                $prestationComposee50->AddPrestation($prestation25);
                $prestationComposee50->AddPrestation($prestation30);

                $manager->persist($prestationComposee50);
                $manager->flush();
                 
                $prestationComposee51=new PrestationComposee;
                $prestationComposee51->SetNom('shampooing + coupe + brushing');
                $prestationComposee51->SetTarif(39);
                $prestationComposee51->SetSalon($salon2);
                $prestationComposee51->setGenre('femme');
                $prestationComposee51->setTypeCheveux('long');
                $prestationComposee51->AddPrestation($prestation22);
                $prestationComposee51->AddPrestation($prestation26);
                $prestationComposee51->AddPrestation($prestation31);

                $manager->persist($prestationComposee51);
                $manager->flush();

                $prestationComposee52=new PrestationComposee;
                $prestationComposee52->SetNom('shampooing + coupe');
                $prestationComposee52->SetTarif(25);
                $prestationComposee52->SetSalon($salon2);
                $prestationComposee52->setGenre('femme');
                $prestationComposee52->setTypeCheveux('court');
                $prestationComposee52->AddPrestation($prestation22);
                $prestationComposee52->AddPrestation($prestation25);

                $manager->persist($prestationComposee52);
                $manager->flush();

                $prestationComposee53=new PrestationComposee;
                $prestationComposee53->SetNom('shampooing + coupe');
                $prestationComposee53->SetTarif(27);
                $prestationComposee53->SetSalon($salon2);
                $prestationComposee53->setGenre('femme');
                $prestationComposee53->setTypeCheveux('long');
                $prestationComposee53->AddPrestation($prestation22);
                $prestationComposee53->AddPrestation($prestation26);

                $manager->persist($prestationComposee53);
                $manager->flush();

                $prestationComposee54=new PrestationComposee;
                $prestationComposee54->SetNom('shampooing + coupe');
                $prestationComposee54->SetTarif(20);
                $prestationComposee54->SetSalon($salon2);
                $prestationComposee54->setGenre('homme');
                $prestationComposee54->setTypeCheveux('court');
                $prestationComposee54->AddPrestation($prestation22);
                $prestationComposee54->AddPrestation($prestation27);

                $manager->persist($prestationComposee54);
                $manager->flush();

                $prestationComposee55=new PrestationComposee;
                $prestationComposee55->SetNom('shampooing + coupe');
                $prestationComposee55->SetTarif(23);
                $prestationComposee55->SetSalon($salon2);
                $prestationComposee55->setGenre('homme');
                $prestationComposee55->setTypeCheveux('long');
                $prestationComposee55->AddPrestation($prestation22);
                $prestationComposee55->AddPrestation($prestation28);

                $manager->persist($prestationComposee55);
                $manager->flush();

                $prestationComposee56=new PrestationComposee;
                $prestationComposee56->SetNom('shampooing + coupe');
                $prestationComposee56->SetTarif(13);
                $prestationComposee56->SetSalon($salon2);
                $prestationComposee56->setGenre('enfant');
                $prestationComposee56->setTypeCheveux('commun');
                $prestationComposee56->AddPrestation($prestation22);
                $prestationComposee56->AddPrestation($prestation29);

                $manager->persist($prestationComposee56);
                $manager->flush();

                $prestationComposee57=new PrestationComposee;
                $prestationComposee57->SetNom('shampooing + couleur + brushing');
                $prestationComposee57->SetTarif(43);
                $prestationComposee57->SetSalon($salon2);
                $prestationComposee57->setGenre('femme');
                $prestationComposee57->setTypeCheveux('court');
                $prestationComposee57->AddPrestation($prestation22);
                $prestationComposee57->AddPrestation($prestation32);
                $prestationComposee57->AddPrestation($prestation30);

                $manager->persist($prestationComposee57);
                $manager->flush();

                $prestationComposee58=new PrestationComposee;
                $prestationComposee58->SetNom('shampooing + couleur + brushing');
                $prestationComposee58->SetTarif(52);
                $prestationComposee58->SetSalon($salon2);
                $prestationComposee58->setGenre('femme');
                $prestationComposee58->setTypeCheveux('long');
                $prestationComposee58->AddPrestation($prestation22);
                $prestationComposee58->AddPrestation($prestation33);
                $prestationComposee58->AddPrestation($prestation31);

                $manager->persist($prestationComposee58);
                $manager->flush();

                $prestationComposee59=new PrestationComposee;
                $prestationComposee59->SetNom('shampooing + couleur');
                $prestationComposee59->SetTarif(35);
                $prestationComposee59->SetSalon($salon2);
                $prestationComposee59->setGenre('homme');
                $prestationComposee59->setTypeCheveux('court');
                $prestationComposee59->AddPrestation($prestation22);
                $prestationComposee59->AddPrestation($prestation34);

                $manager->persist($prestationComposee59);
                $manager->flush();

                $prestationComposee60=new PrestationComposee;
                $prestationComposee60->SetNom('shampooing + couleur');
                $prestationComposee60->SetTarif(40);
                $prestationComposee60->SetSalon($salon2);
                $prestationComposee60->setGenre('homme');
                $prestationComposee60->setTypeCheveux('long');
                $prestationComposee60->AddPrestation($prestation22);
                $prestationComposee60->AddPrestation($prestation35);

                $manager->persist($prestationComposee60);
                $manager->flush();

                $prestationComposee61=new PrestationComposee;
                $prestationComposee61->SetNom('shampooing + coupe + couleur + brushing');
                $prestationComposee61->SetTarif(63);
                $prestationComposee61->SetSalon($salon2);
                $prestationComposee61->setGenre('femme');
                $prestationComposee61->setTypeCheveux('court');
                $prestationComposee61->AddPrestation($prestation22);
                $prestationComposee61->AddPrestation($prestation25);
                $prestationComposee61->AddPrestation($prestation32);
                $prestationComposee61->AddPrestation($prestation30);

                $manager->persist($prestationComposee61);
                $manager->flush();

                $prestationComposee62=new PrestationComposee;
                $prestationComposee62->SetNom('shampooing + coupe + couleur + brushing');
                $prestationComposee62->SetTarif(74);
                $prestationComposee62->SetSalon($salon2);
                $prestationComposee62->setGenre('femme');
                $prestationComposee62->setTypeCheveux('long');
                $prestationComposee62->AddPrestation($prestation22);
                $prestationComposee62->AddPrestation($prestation26);
                $prestationComposee62->AddPrestation($prestation33);
                $prestationComposee62->AddPrestation($prestation31);

                $manager->persist($prestationComposee62);
                $manager->flush();

                $prestationComposee63=new PrestationComposee;
                $prestationComposee63->SetNom('shampooing + coupe + couleur');
                $prestationComposee63->SetTarif(55);
                $prestationComposee63->SetSalon($salon2);
                $prestationComposee63->setGenre('homme');
                $prestationComposee63->setTypeCheveux('court');
                $prestationComposee63->AddPrestation($prestation22);
                $prestationComposee63->AddPrestation($prestation25);
                $prestationComposee63->AddPrestation($prestation32);

                $manager->persist($prestationComposee63);
                $manager->flush();

                $prestationComposee64=new PrestationComposee;
                $prestationComposee64->SetNom('shampooing + coupe + couleur');
                $prestationComposee64->SetTarif(62);
                $prestationComposee64->SetSalon($salon2);
                $prestationComposee64->setGenre('homme');
                $prestationComposee64->setTypeCheveux('long');
                $prestationComposee64->AddPrestation($prestation22);
                $prestationComposee64->AddPrestation($prestation26);
                $prestationComposee64->AddPrestation($prestation33);

                $manager->persist($prestationComposee64);
                $manager->flush();


                

            $salon2->addPrestationsComposee($prestationComposee34);
            $salon2->addPrestationsComposee($prestationComposee35);
            $salon2->addPrestationsComposee($prestationComposee36);
            $salon2->addPrestationsComposee($prestationComposee37);
            $salon2->addPrestationsComposee($prestationComposee38);
            $salon2->addPrestationsComposee($prestationComposee39);
            $salon2->addPrestationsComposee($prestationComposee40);
            $salon2->addPrestationsComposee($prestationComposee41);
            $salon2->addPrestationsComposee($prestationComposee42);
            $salon2->addPrestationsComposee($prestationComposee43);
            $salon2->addPrestationsComposee($prestationComposee44);
            $salon2->addPrestationsComposee($prestationComposee45);
            $salon2->addPrestationsComposee($prestationComposee46);
            $salon2->addPrestationsComposee($prestationComposee47);
            $salon2->addPrestationsComposee($prestationComposee48);
            $salon2->addPrestationsComposee($prestationComposee49);
            $salon2->addPrestationsComposee($prestationComposee50);
            $salon2->addPrestationsComposee($prestationComposee51);
            $salon2->addPrestationsComposee($prestationComposee52);
            $salon2->addPrestationsComposee($prestationComposee53);
            $salon2->addPrestationsComposee($prestationComposee54);
            $salon2->addPrestationsComposee($prestationComposee55);
            $salon2->addPrestationsComposee($prestationComposee56);
            $salon2->addPrestationsComposee($prestationComposee58);
            $salon2->addPrestationsComposee($prestationComposee59);
            $salon2->addPrestationsComposee($prestationComposee60);
            $salon2->addPrestationsComposee($prestationComposee61);
            $salon2->addPrestationsComposee($prestationComposee62);
            $salon2->addPrestationsComposee($prestationComposee63);
            $salon2->addPrestationsComposee($prestationComposee64);


 
            // enregistrement des coiffeurs

                $coiffeur3=new Coiffeur;
                $coiffeur3->SetNom('coiffeur3');
                $coiffeur3->SetSalon($salon2);
                $coiffeur3->addPrestationsComposee($prestationComposee2);

                $manager->persist($coiffeur3);
                $manager->flush();

                $coiffeur4=new Coiffeur;
                $coiffeur4->SetNom('coiffeur4');
                $coiffeur4->SetSalon($salon2);
                $coiffeur4->addPrestationsComposee($prestationComposee1);
                $coiffeur4->addPrestationsComposee($prestationComposee2);

                $manager->persist($coiffeur4);
                $manager->flush();

            $salon2->AddCoiffeur($coiffeur3);
            $salon2->AddCoiffeur($coiffeur4);

            $manager->persist($salon2);
            $manager->flush();

        // enregistrement dispos ------------------------------------------------------------------------------------

            $dispo6=new Disponibilite;
            $dispo6->SetDate(new \DateTime('2018-07-13'));
            $dispo6->SetHeureDebut(new \DateTime('09:00:00'));
            $dispo6->SetHeureFin(new \DateTime('10:00:00'));
            $dispo6->SetEtat('disponible');
            $dispo6->SetArchive(false);
            $dispo6->SetCoiffeur($coiffeur3);

            $manager->persist($dispo6);
            $manager->flush();

            $dispo7=new Disponibilite;
            $dispo7->SetDate(new \DateTime('2018-07-13'));
            $dispo7->SetHeureDebut(new \DateTime('11:30:00'));
            $dispo7->SetHeureFin(new \DateTime('13:00:00'));
            $dispo7->SetEtat('disponible');
            $dispo7->SetArchive(false);
            $dispo7->SetCoiffeur($coiffeur3);

            $manager->persist($dispo7);
            $manager->flush();

            $dispo8=new Disponibilite;
            $dispo8->SetDate(new \DateTime('2018-07-13'));
            $dispo8->SetHeureDebut(new \DateTime('15:30:00'));
            $dispo8->SetHeureFin(new \DateTime('17:00:00'));
            $dispo8->SetEtat('disponible');
            $dispo8->SetArchive(false);
            $dispo8->SetCoiffeur($coiffeur4);

            $manager->persist($dispo8);
            $manager->flush();

            $dispo9=new Disponibilite;
            $dispo9->SetDate(new \DateTime('2018-07-13'));
            $dispo9->SetHeureDebut(new \DateTime('09:00:00'));
            $dispo9->SetHeureFin(new \DateTime('10:00:00'));
            $dispo9->SetEtat('disponible');
            $dispo9->SetArchive(false);
            $dispo9->SetCoiffeur($coiffeur4);

            $manager->persist($dispo9);
            $manager->flush();

            $dispo10=new Disponibilite;
            $dispo10->SetDate(new \DateTime('2018-07-13'));
            $dispo10->SetHeureDebut(new \DateTime('15:00:00'));
            $dispo10->SetHeureFin(new \DateTime('17:00:00'));
            $dispo10->SetEtat('disponible');
            $dispo10->SetArchive(false);
            $dispo10->SetCoiffeur($coiffeur4);

            $manager->persist($dispo10);
            $manager->flush();

        
        // enregistrement des clients --------------------------------------------------------------------------------
           
            $user4=new User();
            $user4->setUsername('client2');
            $user4->setPassword($this->passwordEncoder->encodePassword($user4, 'alex'));
            $user4->setRoles(['CLIENT']);

            $manager->persist($user4);
            $manager->flush();

            $client2=new Client;
            $client2->SetNom('hyardin');
            $client2->SetPrenom('jeanh');
            $client2->SetEmail('jeanh@live.fr');
            $client2->SetTelephone('0783382525');
            $client2->SetAdresse('50b rue victor hugo');
            $client2->SetCodePostale('76520');
            $client2->SetVille('franqueville-saint-pierre');
            $client2->SetUser($user4);

            $manager->persist($client2);
            $manager->flush();

        // enregistrement de prestations clients / reservations ---------------------------------------------------------

            $prestationClient3=new PrestationClient;
            $prestationClient3->SetHeureDebut(new \DateTime('12:00:00'));
            $prestationClient3->SetHeureFin(new \DateTime('13:00:00'));
            $prestationClient3->addPrestationsComposee($prestationComposee39);
            $prestationClient3->SetDisponibilite($dispo6);

            $manager->persist($prestationClient3);
            $manager->flush();

            $prestationClient4=new PrestationClient;
            $prestationClient4->SetHeureDebut(new \DateTime('9:00:00'));
            $prestationClient4->SetHeureFin(new \DateTime('10:00:00'));
            $prestationClient4->addPrestationsComposee($prestationComposee42);
            $prestationClient4->SetDisponibilite($dispo7);

            $manager->persist($prestationClient4);
            $manager->flush();

            // reservation

            $resa3=new Reservation;
            $resa3->SetNumero('XXX-13072018-001');
            $resa3->SetTarif(170.00);
            $resa3->setCreatedAt(new \DateTime("now"));
            $resa3->SetClient($client2);
            $resa3->addPrestationsClient($prestationClient3);


            $manager->persist($resa3);
            $manager->flush();

            $resa4=new Reservation;
            $resa4->SetNumero('XXX-13072018-002');
            $resa4->SetTarif(170.00);
            $resa4->setCreatedAt(new \DateTime("now"));
            $resa4->SetClient($client2);
            $resa4->addPrestationsClient($prestationClient4);

            $manager->persist($resa4);
            $manager->flush();

        


        // salon numero 3 (sans prestations couleurs, meches et balayages )--------------------------------------------------------------------------


        $user5=new User();
        $user5->setUsername('salon3');
        $user5->setPassword($this->passwordEncoder->encodePassword($user5, 'guillaumesalon'));
        $user5->setRoles(['SALON']);

        $manager->persist($user5);
        $manager->flush();

        $salon3 = new Salon();
        $salon3->setNom('salon3');
        $salon3->setEmail('guillaume@live.fr');
        $salon3->setTelephone('0783382525');
        $salon3->setAdresse('52 rue de gevres');
        $salon3->setCodePostale('60000');
        $salon3->setVille('beauvais');
        $salon3->setNote(0);
        $salon3->setHoraire('du mardi au samedi de 10h à 19h');
        $salon3->SetUser($user4);

        

        // enregistrement de prestations

            $prestation45 = new Prestation();
            $prestation45->setNom('shampooing');
            $prestation45->setDuree(10);
            $prestation45->setTarif(5);
            $prestation45->setGenre('commun');
            $prestation45->setTypeCheveux('commun');

            $manager->persist($prestation45);
            $manager->flush();

            $prestation46 = new Prestation();
            $prestation46->setNom('coiffure');
            $prestation46->setDuree(10);
            $prestation46->setTarif(5);
            $prestation46->setGenre('femme');
            $prestation46->setTypeCheveux('court');

            $manager->persist($prestation46);
            $manager->flush();

            $prestation47 = new Prestation();
            $prestation47->setNom('coiffure');
            $prestation47->setDuree(30);
            $prestation47->setTarif(8);
            $prestation47->setGenre('femme');
            $prestation47->setTypeCheveux('long');

            $manager->persist($prestation47);
            $manager->flush();

            $prestation48 = new Prestation();
            $prestation48->setNom('coupe');
            $prestation48->setDuree(60);
            $prestation48->setTarif(18);
            $prestation48->setGenre('femme');
            $prestation48->setTypeCheveux('court');

            $manager->persist($prestation48);
            $manager->flush();

            $prestation49 = new Prestation();
            $prestation49->setNom('coupe');
            $prestation49->setDuree(60);
            $prestation49->setTarif(20);
            $prestation49->setGenre('femme');
            $prestation49->setTypeCheveux('long');

            $manager->persist($prestation49);
            $manager->flush();

            $prestation50 = new Prestation();
            $prestation50->setNom('coupe');
            $prestation50->setDuree(30);
            $prestation50->setTarif(13);
            $prestation50->setGenre('homme');
            $prestation50->setTypeCheveux('court');

            $manager->persist($prestation50);
            $manager->flush();

            $prestation51 = new Prestation();
            $prestation51->setNom('coupe');
            $prestation51->setDuree(30);
            $prestation51->setTarif(15);
            $prestation51->setGenre('homme');
            $prestation51->setTypeCheveux('long');

            $manager->persist($prestation51);
            $manager->flush();

            $prestation52 = new Prestation();
            $prestation52->setNom('coupe');
            $prestation52->setDuree(30);
            $prestation52->setTarif(6);
            $prestation52->setGenre('enfant');
            $prestation52->setTypeCheveux('commun');

            $manager->persist($prestation52);
            $manager->flush();

            $prestation53 = new Prestation();
            $prestation53->setNom('brushing');
            $prestation53->setDuree(30);
            $prestation53->setTarif(6);
            $prestation53->setGenre('femme');
            $prestation53->setTypeCheveux('court');

            $manager->persist($prestation53);
            $manager->flush();

            $prestation54 = new Prestation();
            $prestation54->setNom('brushing');
            $prestation54->setDuree(30);
            $prestation54->setTarif(10);
            $prestation54->setGenre('femme');
            $prestation54->setTypeCheveux('long');

            $manager->persist($prestation54);
            $manager->flush();

            $prestation55 = new Prestation();
            $prestation55->setNom('couleur');
            $prestation55->setDuree(60);
            $prestation55->setTarif(33);
            $prestation55->setGenre('femme');
            $prestation55->setTypeCheveux('court');

            $manager->persist($prestation55);
            $manager->flush();

            $prestation56 = new Prestation();
            $prestation56->setNom('couleur');
            $prestation56->setDuree(60);
            $prestation56->setTarif(38);
            $prestation56->setGenre('femme');
            $prestation56->setTypeCheveux('long');

            $manager->persist($prestation56);
            $manager->flush();
            
            $prestation57 = new Prestation();
            $prestation57->setNom('couleur');
            $prestation57->setDuree(60);
            $prestation57->setTarif(33);
            $prestation57->setGenre('homme');
            $prestation57->setTypeCheveux('court');

            $manager->persist($prestation57);
            $manager->flush();

            $prestation58 = new Prestation();
            $prestation58->setNom('couleur');
            $prestation58->setDuree(60);
            $prestation58->setTarif(38);
            $prestation58->setGenre('homme');
            $prestation58->setTypeCheveux('long');

            $manager->persist($prestation58);
            $manager->flush();

            $prestation59 = new Prestation();
            $prestation59->setNom('meche');
            $prestation59->setDuree(60);
            $prestation59->setTarif(45);
            $prestation59->setGenre('femme');
            $prestation59->setTypeCheveux('court');

            $manager->persist($prestation59);
            $manager->flush();

            $prestation60 = new Prestation();
            $prestation60->setNom('meche');
            $prestation60->setDuree(60);
            $prestation60->setTarif(50);
            $prestation60->setGenre('femme');
            $prestation60->setTypeCheveux('long');

            $manager->persist($prestation60);
            $manager->flush();

            $prestation61 = new Prestation();
            $prestation61->setNom('meche');
            $prestation61->setDuree(60);
            $prestation61->setTarif(50);
            $prestation61->setGenre('homme');
            $prestation61->setTypeCheveux('long');

            $manager->persist($prestation61);
            $manager->flush();

            $prestation62 = new Prestation();
            $prestation62->setNom('balayage');
            $prestation62->setDuree(60);
            $prestation62->setTarif(40);
            $prestation62->setGenre('femme');
            $prestation62->setTypeCheveux('court');

            $manager->persist($prestation62);
            $manager->flush();

            $prestation63 = new Prestation();
            $prestation63->setNom('balayage');
            $prestation63->setDuree(60);
            $prestation63->setTarif(45);
            $prestation63->setGenre('femme');
            $prestation63->setTypeCheveux('long');

            $manager->persist($prestation63);
            $manager->flush();

            $prestation64 = new Prestation();
            $prestation64->setNom('soin');
            $prestation64->setDuree(15);
            $prestation64->setTarif(10);
            $prestation64->setGenre('commun');
            $prestation64->setTypeCheveux('commun');

            $manager->persist($prestation64);
            $manager->flush();

            $prestation65 = new Prestation();
            $prestation65->setNom('chignon');
            $prestation65->setDuree(30);
            $prestation65->setTarif(25);
            $prestation65->setGenre('femme');
            $prestation65->setTypeCheveux('long');

            $manager->persist($prestation65);
            $manager->flush();

            $prestation66 = new Prestation();
            $prestation66->setNom('lissage bresilien');
            $prestation66->setDuree(180);
            $prestation66->setTarif(200);
            $prestation66->setGenre('femme');
            $prestation66->setTypeCheveux('long');

            $manager->persist($prestation66);
            $manager->flush();

            $prestation67 = new Prestation();
            $prestation67->setNom('lissage japonnais');
            $prestation67->setDuree(120);
            $prestation67->setTarif(300);
            $prestation67->setGenre('femme');
            $prestation67->setTypeCheveux('long');

            $manager->persist($prestation67);
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


            $prestationComposee65=new PrestationComposee;
            $prestationComposee65->SetNom('shampooing');
            $prestationComposee65->SetTarif(5);
            $prestationComposee65->SetSalon($salon3);
            $prestationComposee65->AddPrestation($prestation45);
            $prestationComposee65->setGenre('commun');
            $prestationComposee65->setTypeCheveux('commun');

            $manager->persist($prestationComposee65);
            $manager->flush();

            $prestationComposee66=new PrestationComposee;
            $prestationComposee66->SetNom('coiffure');
            $prestationComposee66->SetTarif(5);
            $prestationComposee66->SetSalon($salon3);
            $prestationComposee66->AddPrestation($prestation46);
            $prestationComposee66->setGenre('femme');
            $prestationComposee66->setTypeCheveux('court');

            $manager->persist($prestationComposee66);
            $manager->flush();

            $prestationComposee67=new PrestationComposee;
            $prestationComposee67->SetNom('coiffure');
            $prestationComposee67->SetTarif(8);
            $prestationComposee67->SetSalon($salon3);
            $prestationComposee67->AddPrestation($prestation47);
            $prestationComposee67->setGenre('femme');
            $prestationComposee67->setTypeCheveux('long');

            $manager->persist($prestationComposee67);
            $manager->flush();


            $prestationComposee68=new PrestationComposee;
            $prestationComposee68->SetNom('coupe');
            $prestationComposee68->SetTarif(18);
            $prestationComposee68->SetSalon($salon3);
            $prestationComposee68->AddPrestation($prestation48);
            $prestationComposee68->setGenre('femme');
            $prestationComposee68->setTypeCheveux('court');

            $manager->persist($prestationComposee68);
            $manager->flush();

            $prestationComposee69=new PrestationComposee;
            $prestationComposee69->SetNom('coupe');
            $prestationComposee69->SetTarif(20);
            $prestationComposee69->SetSalon($salon3);
            $prestationComposee69->AddPrestation($prestation49);
            $prestationComposee69->setGenre('femme');
            $prestationComposee69->setTypeCheveux('long');

            $manager->persist($prestationComposee69);
            $manager->flush();

            $prestationComposee70=new PrestationComposee;
            $prestationComposee70->SetNom('coupe');
            $prestationComposee70->SetTarif(13);
            $prestationComposee70->SetSalon($salon3);
            $prestationComposee70->AddPrestation($prestation50);
            $prestationComposee70->setGenre('homme');
            $prestationComposee70->setTypeCheveux('court');

            $manager->persist($prestationComposee70);
            $manager->flush();

            $prestationComposee71=new PrestationComposee;
            $prestationComposee71->SetNom('coupe');
            $prestationComposee71->SetTarif(15);
            $prestationComposee71->SetSalon($salon3);
            $prestationComposee71->AddPrestation($prestation51);
            $prestationComposee71->setGenre('homme');
            $prestationComposee71->setTypeCheveux('long');

            $manager->persist($prestationComposee71);
            $manager->flush();

            $prestationComposee72=new PrestationComposee;
            $prestationComposee72->SetNom('coupe');
            $prestationComposee72->SetTarif(6);
            $prestationComposee72->SetSalon($salon3);
            $prestationComposee72->AddPrestation($prestation52);
            $prestationComposee72->setGenre('enfant');
            $prestationComposee72->setTypeCheveux('commun');

            $manager->persist($prestationComposee72);
            $manager->flush();

            $prestationComposee73=new PrestationComposee;
            $prestationComposee73->SetNom('soin');
            $prestationComposee73->SetTarif(10);
            $prestationComposee73->SetSalon($salon3);
            $prestationComposee73->AddPrestation($prestation64);
            $prestationComposee73->setGenre('commun');
            $prestationComposee73->setTypeCheveux('commun');

            $manager->persist($prestationComposee73);
            $manager->flush();

            $prestationComposee77=new PrestationComposee;
            $prestationComposee77->SetNom('shampooing + brushing');
            $prestationComposee77->SetTarif(11);
            $prestationComposee77->SetSalon($salon3);
            $prestationComposee77->setGenre('femme');
            $prestationComposee77->setTypeCheveux('court');
            $prestationComposee77->AddPrestation($prestation45);
            $prestationComposee77->AddPrestation($prestation53);

            $manager->persist($prestationComposee77);
            $manager->flush();

            $prestationComposee78=new PrestationComposee;
            $prestationComposee78->SetNom('shampooing + brushing');
            $prestationComposee78->SetTarif(15);
            $prestationComposee78->SetSalon($salon3);
            $prestationComposee78->setGenre('femme');
            $prestationComposee78->setTypeCheveux('long');
            $prestationComposee78->AddPrestation($prestation45);
            $prestationComposee78->AddPrestation($prestation54);

            $manager->persist($prestationComposee78);
            $manager->flush();

            $prestationComposee79=new PrestationComposee;
            $prestationComposee79->SetNom('coupe + brushing');
            $prestationComposee79->SetTarif(24);
            $prestationComposee79->SetSalon($salon3);
            $prestationComposee79->setGenre('femme');
            $prestationComposee79->setTypeCheveux('court');
            $prestationComposee79->AddPrestation($prestation48);
            $prestationComposee79->AddPrestation($prestation53);

            $manager->persist($prestationComposee79);
            $manager->flush();

            $prestationComposee80=new PrestationComposee;
            $prestationComposee80->SetNom('coupe + brushing');
            $prestationComposee80->SetTarif(30);
            $prestationComposee80->SetSalon($salon3);
            $prestationComposee80->setGenre('femme');
            $prestationComposee80->setTypeCheveux('long');
            $prestationComposee80->AddPrestation($prestation49);
            $prestationComposee80->AddPrestation($prestation54);

            $manager->persist($prestationComposee80);
            $manager->flush();

            $prestationComposee81=new PrestationComposee;
            $prestationComposee81->SetNom('shampooing + coupe + brushing');
            $prestationComposee81->SetTarif(29);
            $prestationComposee81->SetSalon($salon3);
            $prestationComposee81->setGenre('femme');
            $prestationComposee81->setTypeCheveux('court');
            $prestationComposee81->AddPrestation($prestation45);
            $prestationComposee81->AddPrestation($prestation48);
            $prestationComposee81->AddPrestation($prestation53);

            $manager->persist($prestationComposee81);
            $manager->flush();
             
            $prestationComposee82=new PrestationComposee;
            $prestationComposee82->SetNom('shampooing + coupe + brushing');
            $prestationComposee82->SetTarif(35);
            $prestationComposee82->SetSalon($salon3);
            $prestationComposee82->setGenre('femme');
            $prestationComposee82->setTypeCheveux('long');
            $prestationComposee82->AddPrestation($prestation45);
            $prestationComposee82->AddPrestation($prestation49);
            $prestationComposee82->AddPrestation($prestation54);

            $manager->persist($prestationComposee82);
            $manager->flush();

            $prestationComposee83=new PrestationComposee;
            $prestationComposee83->SetNom('shampooing + coupe');
            $prestationComposee83->SetTarif(23);
            $prestationComposee83->SetSalon($salon3);
            $prestationComposee83->setGenre('femme');
            $prestationComposee83->setTypeCheveux('court');
            $prestationComposee83->AddPrestation($prestation45);
            $prestationComposee83->AddPrestation($prestation48);

            $manager->persist($prestationComposee83);
            $manager->flush();

            $prestationComposee84=new PrestationComposee;
            $prestationComposee84->SetNom('shampooing + coupe');
            $prestationComposee84->SetTarif(25);
            $prestationComposee84->SetSalon($salon3);
            $prestationComposee84->setGenre('femme');
            $prestationComposee84->setTypeCheveux('long');
            $prestationComposee84->AddPrestation($prestation45);
            $prestationComposee84->AddPrestation($prestation49);

            $manager->persist($prestationComposee84);
            $manager->flush();

            $prestationComposee85=new PrestationComposee;
            $prestationComposee85->SetNom('shampooing + coupe');
            $prestationComposee85->SetTarif(18);
            $prestationComposee85->SetSalon($salon3);
            $prestationComposee85->setGenre('homme');
            $prestationComposee85->setTypeCheveux('court');
            $prestationComposee85->AddPrestation($prestation45);
            $prestationComposee85->AddPrestation($prestation50);

            $manager->persist($prestationComposee85);
            $manager->flush();

            $prestationComposee86=new PrestationComposee;
            $prestationComposee86->SetNom('shampooing + coupe');
            $prestationComposee86->SetTarif(20);
            $prestationComposee86->SetSalon($salon3);
            $prestationComposee86->setGenre('homme');
            $prestationComposee86->setTypeCheveux('long');
            $prestationComposee86->AddPrestation($prestation45);
            $prestationComposee86->AddPrestation($prestation51);

            $manager->persist($prestationComposee86);
            $manager->flush();

            $prestationComposee87=new PrestationComposee;
            $prestationComposee87->SetNom('shampooing + coupe');
            $prestationComposee87->SetTarif(11);
            $prestationComposee87->SetSalon($salon3);
            $prestationComposee87->setGenre('enfant');
            $prestationComposee87->setTypeCheveux('commun');
            $prestationComposee87->AddPrestation($prestation45);
            $prestationComposee87->AddPrestation($prestation52);

            $manager->persist($prestationComposee87);
            $manager->flush();

            

        $salon3->addPrestationsComposee($prestationComposee65);
        $salon3->addPrestationsComposee($prestationComposee66);
        $salon3->addPrestationsComposee($prestationComposee67);
        $salon3->addPrestationsComposee($prestationComposee68);
        $salon3->addPrestationsComposee($prestationComposee69);
        $salon3->addPrestationsComposee($prestationComposee70);
        $salon3->addPrestationsComposee($prestationComposee71);
        $salon3->addPrestationsComposee($prestationComposee72);
        $salon3->addPrestationsComposee($prestationComposee73);
        $salon3->addPrestationsComposee($prestationComposee77);
        $salon3->addPrestationsComposee($prestationComposee78);
        $salon3->addPrestationsComposee($prestationComposee79);
        $salon3->addPrestationsComposee($prestationComposee80);
        $salon3->addPrestationsComposee($prestationComposee81);
        $salon3->addPrestationsComposee($prestationComposee82);
        $salon3->addPrestationsComposee($prestationComposee83);
        $salon3->addPrestationsComposee($prestationComposee84);
        $salon3->addPrestationsComposee($prestationComposee85);
        $salon3->addPrestationsComposee($prestationComposee86);
        $salon3->addPrestationsComposee($prestationComposee87);




        // enregistrement des coiffeurs

            $coiffeur5=new Coiffeur;
            $coiffeur5->SetNom('coiffeur5');
            $coiffeur5->SetSalon($salon3);
            $coiffeur5->addPrestationsComposee($prestationComposee2);

            $manager->persist($coiffeur5);
            $manager->flush();


        $salon3->AddCoiffeur($coiffeur5);

        $manager->persist($salon3);
        $manager->flush();

    // enregistrement dispos ------------------------------------------------------------------------------------

        $dispo11=new Disponibilite;
        $dispo11->SetDate(new \DateTime('2018-07-13'));
        $dispo11->SetHeureDebut(new \DateTime('09:00:00'));
        $dispo11->SetHeureFin(new \DateTime('10:00:00'));
        $dispo11->SetEtat('disponible');
        $dispo11->SetArchive(false);
        $dispo11->SetCoiffeur($coiffeur5);

        $manager->persist($dispo11);
        $manager->flush();

        $dispo12=new Disponibilite;
        $dispo12->SetDate(new \DateTime('2018-07-13'));
        $dispo12->SetHeureDebut(new \DateTime('11:30:00'));
        $dispo12->SetHeureFin(new \DateTime('13:00:00'));
        $dispo12->SetEtat('disponible');
        $dispo12->SetArchive(false);
        $dispo12->SetCoiffeur($coiffeur5);

        $manager->persist($dispo12);
        $manager->flush();

       
    
    // enregistrement des clients --------------------------------------------------------------------------------
       
        $user6=new User();
        $user6->setUsername('client3');
        $user6->setPassword($this->passwordEncoder->encodePassword($user6, 'alex'));
        $user6->setRoles(['CLIENT']);

        $manager->persist($user6);
        $manager->flush();

        $client3=new Client;
        $client3->SetNom('hyardin');
        $client3->SetPrenom('hugues');
        $client3->SetEmail('huguesh@live.fr');
        $client3->SetTelephone('0783382525');
        $client3->SetAdresse('8 rue borgnis laporte');
        $client3->SetCodePostale('60590');
        $client3->SetVille('serifontaine');
        $client3->SetUser($user6);

        $manager->persist($client3);
        $manager->flush();

    // enregistrement de prestations clients / reservations ---------------------------------------------------------

        $prestationClient5=new PrestationClient;
        $prestationClient5->SetHeureDebut(new \DateTime('12:00:00'));
        $prestationClient5->SetHeureFin(new \DateTime('13:00:00'));
        $prestationClient5->addPrestationsComposee($prestationComposee86);
        $prestationClient5->SetDisponibilite($dispo11);

        $manager->persist($prestationClient5);
        $manager->flush();

        $prestationClient6=new PrestationClient;
        $prestationClient6->SetHeureDebut(new \DateTime('9:00:00'));
        $prestationClient6->SetHeureFin(new \DateTime('10:00:00'));
        $prestationClient6->addPrestationsComposee($prestationComposee73);
        $prestationClient6->SetDisponibilite($dispo12);

        $manager->persist($prestationClient6);
        $manager->flush();

        // reservation

        $resa5=new Reservation;
        $resa5->SetNumero('XXX-13072018-001');
        $resa5->SetTarif(30.00);
        $resa5->setCreatedAt(new \DateTime("now"));
        $resa5->SetClient($client3);
        $resa5->addPrestationsClient($prestationClient5);


        $manager->persist($resa5);
        $manager->flush();



    }
}
