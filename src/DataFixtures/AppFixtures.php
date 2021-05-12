<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
         // créer un user ROLE_ADMIN
            $user = new User();
            $email = 'test-admin@example.com';
            $roles = ["ROLE_ADMIN"];
            $password = $this->encoder->encodePassword($user, 'admin123');
    
            $user->setEmail($email)
            ->setRoles($roles)
            ->setPassword($password);
    
            $manager->persist($user);
       // créer des offres d'emploi

        $faker = Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 20; $i++){
            $offer = new Offer();
            $offer->setPublicationDate($faker->dateTimeBetween('-3 months', 'now'))
                ->setReference($faker->randomNumber(5, true))
                ->setTitle($faker->sentence(3))
                ->setDescription($faker->paragraph())
                ->setProfile($faker->paragraph())
                ->setLocation($faker->city())
                ->setVacantPosition($faker->randomNumber(2))
                ->setExcerpt($faker->paragraph())
                ->setStatus('Cadre')
                ->setDateStart("Le poste $i est à pourvoir le 21/04/2021")
                ->setContractType('CDI')
                ->setWeeklyWorkTime('35h/semaine')
                ->setRemuneration($faker->randomNumber(4, true)."€/mois")
                ->setFurtherInformation($faker->paragraph())
                ->setIsActive($faker->boolean());

            $manager->persist($offer);
        }
        $manager->flush();
    }
}
