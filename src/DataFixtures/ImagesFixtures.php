<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImagesFixtures extends Fixture implements DependentFixtureInterface{
    public function load(ObjectManager $manager): void
    {
      $faker = Faker\Factory::create('fr_FR');

      for($img = 1;$img<=100;$img++){
        $image = new Images();
        $image->setNom($faker->image(null,640,480));
        $produit=$this->getReference('prod-'.rand(1,10));
        $image->setProduits($produit);
        
        $manager->persist($image);
      }
      
        $manager->flush();
    }
public function getDependencies():array
{
return [
    ProduitFixtures::class,
];
}
}
