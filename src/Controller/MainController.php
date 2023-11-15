<?php

namespace App\Controller;


use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/acceuil', name: 'app_main')]
     public function index(CategorieRepository $categorieRepository): Response
    {
        
        return $this->render('acceuil/index.html.twig', ['categorie'=>$categorieRepository->
        findBy([],['categorieOrder'=>'asc'])
    ]);
}
}
