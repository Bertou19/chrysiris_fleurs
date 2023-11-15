<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;


#[Route('/produit', name: 'produit_')]
class ProduitController extends AbstractController
{
    
#[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('produit/index.html.twig'
        );
    }
    #[Route('/{nom}', name: 'details')]
    public function details(Produit $produit): Response
    {
       

         return $this->render('produit/details.html.twig'
         , [
             'produit' => $produit
         ]
  );

    }
}
