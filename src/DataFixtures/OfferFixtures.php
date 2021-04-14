<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $offer = new Offer();
            $offer->setPublicationDate(new \DateTime())
                ->setReference("12345.$i")
                ->setTitle("Titre de l'offre numéro $i")
                ->setDescription("Description de l'offre d'emploi numéro $i")
                ->setProfile("Profile recherché pour l'offre $i")
                ->setLocation("Le poste $i est a pourvoir à Lens")
                ->setVacantPosition($i)
                ->setExperience("Pour le poste $i, 2 ans d'expériences sont souhaités")
                ->setStatus('Cadre')
                ->setDateStart("Le poste $i est à pourvoir le 21/04/2021")
                ->setContractType('CDI')
                ->setWeeklyWorkTime('35h/semaine')
                ->setRemuneration("2000€ /mois")
                ->setFurtherInformation("Pas d'infos complémentaires pour l'offre $i");

            $manager->persist($offer);

        }

        $manager->flush();
    }
}
