<?php

namespace App\DataFixtures;


use app\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Faker;

;
class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
       
    ){}
    public function load(ObjectManager$manager):void
    {
        $admin = new User();
        $admin->setEmail('admin@demo.fr');
        
        $admin->setNom('De Almeida');
     
        $admin->setPrenom('Bertille');
       
        $admin->setAdresse('19 rue Louis Plantadis');
        $admin->setVille('Brive');
        $admin->setZipcode('19100');
        $admin->setTelephone('0626078522');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin,'admin')
    );
    $admin->setRoles(['ROLE_ADMIN']);

    $manager->persist($admin);

    $faker = Faker\Factory::create('fr_FR');

    for($usr=1;$usr <=5; $usr++){
        $user = new User();
        $user->setEmail($faker->email);
        $user->setNom($faker->lastName);
        $user->setPrenom($faker->firstName);
        $user->setAdresse($faker->streetAddress);
        $user->setVille($faker->city);
        $user->setZipcode(str_replace(' ','',$faker->postcode));
        $user->setTelephone(str_replace(' ','',$faker->phoneNumber));
        $user->setPassword($this->passwordEncoder->hashPassword($user,'secret')
    );
    $manager->persist($user);
    }
    $manager->flush();
}
}   
   

