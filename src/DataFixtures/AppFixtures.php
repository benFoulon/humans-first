<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Candidate;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Message;
use App\Entity\Offer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{   
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        // @todo créer un faux utilisateur sans aucun privilège mais avec l'id 1

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


        // créer des candidats
        for($i = 0; $i <= 20; $i++){
            $candidate = new Candidate();
            $candidate-> setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setMail($faker->safeEmail())
                ->setPhone("06.12.34.56.7$i")
                ->setTown($faker->city())
                ->setFileName($faker->mimeType());
            
                $manager->persist($candidate);
        }

        // créer des messages
        for($i = 0; $i <= 20; $i++){
            $message = new Message();
            $message-> setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setType('Entreprise')
            ->setTown($faker->city())
            ->setBusinessName($faker->company())
            ->setMail($faker->safeEmail())
            ->setPhone("06.12.34.56.7$i")
            ->setObject($faker->sentence(5))
            ->setContent($faker->paragraph());

            $manager->persist($message);
        }

        // Créer 3 catégorie 
        for($i =1; $i<= 5; $i++){
            $category = new Category;
            $category->setTitle("Catégorie n°$i")
            ->setDescription($faker->paragraph())
            ->setIsActive($faker->boolean());

            $manager->persist($category);

            // Créer entre 2 et 5 article
            for($j = 1; $j<= mt_rand(2, 5); $j++){
                $article = new Article();

                $article->setPublicationDate($faker->dateTimeBetween('-3 months', 'now'))
                ->setTitle($faker->sentence())
                ->setExcerpt($faker->paragraph())
                ->setContent($faker->paragraphs(5, true))
                ->setImageName('366572-6098566a7da8b730202328.jpg')
                ->setCategory($category)
                ->setIsActive($faker->boolean());

                $manager->persist($article);
            }
        }



        $manager->flush();
    }
}
