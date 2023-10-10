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
         $categorie = new Categorie();
        $categorie->setName('Bouquets');
        $categorie->setSlug('bouquets');
          $categorie->persist($categorie);

        $manager->flush();
    }
}
