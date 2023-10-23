<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Categorie;
;

class ProduitFixtures extends Fixture
{
   
    public function load(ObjectManager $manager): void
    {
       $faker = Faker\Factory::create('fr_FR');

       for($prod = 1;$prod<=10;$prod++){
        $produit= new Produit();
        $produit->setNom($faker->text(5));
        $produit->setDescription($faker->text());
        $produit->setPrix($faker->numberBetween(900,25000));

//On va chercher une référence de catégorie

        $categorie =$this->getReference('cat-' .rand(1,4));
        $produit->setIdCategorie($categorie);

        $this->setReference('prod-'.$prod,$produit);

        $manager->persist($produit);
        // $this->addReference('prod-' .$prod,$produit);
       
    }
       
        $manager->flush();
    }
}
