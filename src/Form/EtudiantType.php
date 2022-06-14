<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nomComplet',TextType::class, [
            "label" => "Entrer le nom",
            'attr' => [
                'placeholder' =>  'nom complet',
             'class' => 'form-control' ,
            ]
        ])
        ->add('email',TextType::class, [
            "label" => "Entrer l'email",
            'attr' => [
                'placeholder' =>  'libelle',
             'class' => 'form-control' ,
            ]
        ])

        // ->add('roles',TextType::class, [
        //     "label" => "Entrer le role",
        //     'attr' => [
        //         'placeholder' =>  'libelle',
        //      'class' => 'form-control' ,
        //     ]
        // ])
        // ->add('password',TextType::class, [
        //     "label" => "Entrer une classe",
        //     'attr' => [
        //         'placeholder' =>  'libelle',
        //      'class' => 'form-control' ,
        //     ]
        // ])
        // ->add('matricule',TextType::class, [
        //     "label" => "Entrer le matricule",
        //     'attr' => [
        //         'placeholder' =>  'matricule',
        //      'class' => 'form-control' ,
        //     ]
        // ])
        ->add('sexe',ChoiceType::class, [
            "label" => "séléctionner le sexe",
            'choices' => [
                'M' => 'M',
                'F' => 'F',
            ],
            'expanded' => true,
        
        ])
        ->add('adresse',TextType::class, [
            "label" => "Entrer une addresse",
            'attr' => [
                'placeholder' =>  'addresse',
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
