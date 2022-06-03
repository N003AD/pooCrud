<?php

namespace App\Form;

use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class, [
                "label" => "Entrer une classe",
                'attr' => [
                    'placeholder' =>  'libelle',
                 'class' => 'form-control' ,
                ]
            ])
            ->add('filiere',TextType::class, [
                "label" => "Entrer une filiere",
                'attr' => [
                    'placeholder' =>  'filiere',
                    'class' => 'form-control mt-4' 
                ]
            ])
            ->add('niveau',TextType::class, [
                "label" => "Entrer le niveau",
                'attr' => [
                    'placeholder' =>  'niveau',
                    'class' => 'form-control mt-4'
                ]
            ])
            // J'aimerais ajouter une champ une case à cocher
             
            ->add("Soumettre",SubmitType::class, [
                'attr' => [ 
                    'class' => 'btn btn-primary mt-4'
                ]
            ])
            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}