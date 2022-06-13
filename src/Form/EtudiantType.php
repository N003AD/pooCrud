<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nomComplet',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ->add('email',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])

        ->add('roles',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ->add('password',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ->add('matricule',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ->add('sexe',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ->add('adresse',TextType::class, [
            "label" => "Entrer une classe",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
