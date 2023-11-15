<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use App\Entity\Produit;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;


class ProduitVoter extends Voter
{
const EDIT = 'PRODUCT_EDIT';
    const DELETE ='PRODUCT_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

 protected function supports(string $attribute,$produit): bool
{
if(!in_array($attribute,[self::EDIT, self::DELETE])){
return false;
}
if(!$produit instanceof Produit){
    return false;
}
return true;

// return in_array($attribute,[self::EDIT,self::DELETE])&&
// $produit instanceof Produit;
}

protected function voteOnAttribute($attribute, $produit, 
TokenInterface $token): bool
{
//On récupère l'utilisateur à partir du token
$user = $token->getUser();

if(!$user instanceof UserInterface) return false; 
  
//On vérifie si l'utilisateur est admin
if($this->security->isGranted('ROLE_ADMIN')) return true;
//Si l'utilisateur est connecté mais n'est pas admin, on vérifie les permissions

switch($attribute){
    case self::EDIT:
    //On vérifie si l'utilisateur peut éditer
  
    break;
    case self::DELETE:
    //On vérifie si l'utilisateur peut supprimer
   
    break;
}
}

}
