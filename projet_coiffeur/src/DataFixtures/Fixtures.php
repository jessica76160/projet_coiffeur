<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Etape;
use App\Entity\Prestation;
use App\Entity\Salon;
use App\Entity\PrestationComposee;
use App\Entity\Coiffeur;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // enregistrement salon

            $salon1 = new Salon();
            $salon1->setNom('salon1');
            $salon1->setEmail('jess11590@live.fr');
            $salon1->setTelephone('0783382525');
            $salon1->setAdresse('50b rue victor hugo');
            $salon1->setCodePostale('76520');
            $salon1->setVille('franqueville-saint-pierre');
            $salon1->setPassword('alex181187');
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



        
    }
        

    

}
