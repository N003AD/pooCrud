<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('anneeScolaire')
            
            ->add('etudiant', EtudiantType::class, [
                'data_class'=>Etudiant::class
                 
             ])
             ->add('classe', EntityType::class, [
                'class'=>Classe::class,
                'multiple'=>false,
                'choice_label'=>'libelle'
             ])
             ->add("Soumettre",SubmitType::class, [
                'attr' => [ 
                    'class' => 'btn btn-primary mt-4'
                ]
            ])
           
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
