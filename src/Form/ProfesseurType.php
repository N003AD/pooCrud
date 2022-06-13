<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet')
            ->add('grade')

        ->add('nomComplet',TextType::class, [
            "label" => "Entrer votre nom",
            'attr' => [
                'placeholder' =>  'nom complet',
             'class' => 'form-control' ,
            ]
        ])
        ->add('grade',TextType::class, [
            "label" => "Entrer votre grade",
            'attr' => [
                'placeholder' =>  'grade',
                'class' => 'form-control mt-4' 
            ]
        ])
        ->add('modules',EntityType::class, [
            'class'=>Module::class,
            'choice_label'=>'libelle',
            'multiple' => true,
            'expanded' => false,
            "label" => "Séléctionner les modules du prof",
            'attr' => [
                'class' => 'form-control mt-4'
            ]
            //  'choices' => Professeur::$module,
        ])
        ->add('classes',EntityType::class, [
            'class'=>Classe::class,
            'choice_label'=>'libelle',
            'multiple' => true,
            'expanded' => false,
            "label" => "Séléctionner les modules du prof",
            'attr' => [
                'class' => 'form-control mt-4'
            ],
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
            'data_class' => Professeur::class,
        ]);
    }
}
