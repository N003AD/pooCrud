<?php

namespace App\Form;

use App\Entity\Classe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('libelle')
        ->add('filiere')
        ->add('niveau')
            ->add('libelle',TextType::class, [
                "label" => "Entrer une classe",
                'attr' => [
                    'placeholder' =>  'libelle',
                 'class' => 'form-control mt-4' ,
                ]
            ])
            ->add('filiere',ChoiceType::class, [
                "choices"=> [
                    'Dev Web'=>'Dev Web',
                    "Dev Web mobile" => 'Dev Web mobile',
                    "Ingénieurie Logiciel" => 'Ingénieurie Logiciel',
                    'Référent Digitale' => 'Référent Digitale'
                ],
                'attr' => [
                    'placeholder' =>  'filiere',
                    'class' => 'form-control mt-4' 
                ]
            ])
            ->add('niveau',ChoiceType::class, [
                "label" => "Entrer le niveau",
                'attr' => [
                    'class' => 'form-control mt-4'
                ],

                'choices' => Classe::$niveaux,
            ])
         /*   ->add('filieres',ChoiceType::class, [
                "choices"=> [
                    'Dev Web'=>'Dev Web',
                    "Dev Web mobile" => 'Dev Web mobile',
                    "Ingénieurie Logiciel" => 'Ingénieurie Logiciel',
                    'Référent Digitale' => 'Référent Digitale'
                ],
                'mapped' => false
            ])  
            */

            // ->add('professeurs', EntityType::class,[
            //     'class' => Professeur::class,
            //     'multiple' => true,
            //     'expanded'=>true,
            // ])
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