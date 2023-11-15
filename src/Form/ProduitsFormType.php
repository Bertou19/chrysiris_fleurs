<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class ProduitsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', options:['label' => 'Nom'])
            ->add('description', options:['label' => 'Description'])
            ->add('prix', options:['label' => 'Prix'])
            ->add('id_categorie', EntityType::class,[
            'class' => Categorie::class,
            'choice_label' => 'nom',
            'label' => 'Categorie',
            'group_by'=>'parent.nom',
            'query_builder' => function(CategorieRepository $cr)
            {
                return $cr->createQueryBuilder('c')
                       ->where('c.parent IS NOT NULL')
                       ->orderBy('c.nom','ASC');
            }
            ])
        ->add('images', FileType::class,[
            'label' => false,
            'multiple' => true,
            'mapped' => false,
            'required'=> false
        ])
        
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
