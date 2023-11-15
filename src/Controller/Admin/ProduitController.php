<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProduitsFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Images;


#[Route('/admin/produits', name: 'admin_produit_')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/produit/index.html.twig');
   }
    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em,
    PictureService $pictureService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        // On crée un nouveau produit
        $produit = new Produit();

      //On crée le formulaire
        $form = $this->createForm(ProduitsFormType::class,$produit);
        
        //On traite la requete du formulaire
        $form->handleRequest($request);
        
      //On vérifie si le formulaire est soumis et valide
      if($form->isSubmitted() && $form->isValid()){

//On récupère les images
$images = $form->get('images')->getData();

 foreach($images as $image){
    //On définie le dossier de destination
    $folder = 'produit';

    //On appelle le service d'ajout
$fichier = $pictureService->add($image, $folder,300,300);
   $img = new Images();
   $img->setNom($fichier);
   $produit->addImage($img);
   }
//ON arrondit le prix
        $prix = $produit->getPrix()*100;
        $produit->setPrix($prix);
//ON stocke
        $em->persist($produit);
        $em->flush();
        $this->addFlash('success','Produit ajouté avec succès');
      
    //On redirige
    return $this->redirectToRoute('admin_produit_index');
    }
        return $this->render('admin/produit/add.html.twig',['form'=> $form->createView()]);
 }
   #[Route('/edition/{id}', name: 'edit')]
   public function edit(Produit $produit, Request $request, EntityManagerInterface $em): Response
   {
      //On vérifie si l'utilisateur est édité avec le voter
      $this->denyAccessUnlessGranted('ROLE_ADMIN',$produit); 
    
        //On divise le prix
        $prix = $produit->getPrix()/100;
        $produit->setPrix($prix);
      
      //On crée le formulaire
        $form = $this->createForm(ProduitsFormType::class,$produit);
        
        //On traite la requete du formulaire
        $form->handleRequest($request);
        
      //On vérifie si le formulaire est soumis et valide
      if($form->isSubmitted() && $form->isValid()){
      //ON arrondit le prix
        $prix = $produit->getPrix()*100;
        $produit->setPrix($prix);
      //ON stocke
        $em->persist($produit);
        $em->flush();

        $this->addFlash('success','Produit modifié avec succès');
      
    //On redirige
    return $this->redirectToRoute('admin_produit_index');
    }
        return $this->render('admin/produit/edit.html.twig',['form'=> $form->createView()]);
 }
  #[Route('/suppression/{id}', name: 'delete')]
  public function delete(Produit $produit, Request $request, EntityManagerInterface $em): Response
  {
      //On vérifie si l'utilisateur peut supprimer avec le voter
      $this->denyAccessUnlessGranted('ROLE_ADMIN', $produit);
    
    return $this->render('admin/produit/index.html.twig');
 }
}





