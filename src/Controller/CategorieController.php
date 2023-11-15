<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/categorie', name: 'categorie_')]
class CategorieController extends AbstractController
{
    
   #[Route('/{nom}', name: 'list')]
    public function list(Categorie $categorie): Response
    {
       //ON va chercher la liste des categories
       $produits= $categorie->getProduits();

         return $this->render('categorie/list.html.twig'
         , [
            'categorie' => $categorie,
            'produits' => $produits
        ]
            // Syntaxe alternative
            // return $this->render('categorie/list.html.twig',compact('categorie','produits'))
  );

    }
}
