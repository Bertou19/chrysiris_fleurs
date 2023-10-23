<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class CategorieFixtures extends Fixture
{
    private $counter = 1;

    public function load(ObjectManager $manager): void
    {
        $parent_id = $this->createCategory('Bouquets',null,$manager);
         
        $this->createCategory('Mariage', $parent_id,$manager);
        $this->createCategory('Deuil', $parent_id,$manager);
        $this->createCategory('Evenement', $parent_id,$manager);    
        
        $manager->flush();
    }
    public function createCategory(string $name, Categorie $parent_id=null, ObjectManager $manager)
    {
        $categorie = new Categorie();
        $categorie->setNom($name);
        
        $categorie->setParent($parent_id);
        $manager->persist($categorie);
       
        $this->addReference('cat-'.$this->counter,$categorie);
        $this->counter++;
        
        return $categorie;
}

}

