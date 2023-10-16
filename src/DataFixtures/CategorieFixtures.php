<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $parent_id = new Categorie();
         $parent_id->setNom('Bouquets');
         $parent_id->setSlug('bouquets');
        $manager->persist($parent_id);

        
        $categorie = new Categorie();
        $categorie->setNom('Mariage');
        $categorie->setSlug('mariage');
        $categorie->setParent($parent_id);
        $manager->persist($categorie);
        
        
        $manager->flush();
    }
}
