<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Professeur;
use App\Repository\ModuleRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modules = ['php','java','html','css','uml','js'];
        $grade=["MASTER","INGENIEUR","DOCTEUR"];
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 10; $i++) { 
            # code...
            $pos= rand(0,2);
            $prof= new Professeur();
            // $prof->setNomComplet('prof'.$i);
            // $prof->setGrade('prof'.$i);
            $prof->setNomComplet('Baila Wane'.$i);
            $prof->setGrade($grade[$pos]);
        for ($j=0; $j < 2; $j++) { 
                # code...
                $ref=rand(0,9);
                $prof->addClass($this->getReference('professeur'.$ref));
            }

            // foreach ($modules as $module) {
            //     # code...
            //     $newModule = new Module;
            //     $newModule->setLibelle($module);
            //     $prof->addModule($newModule);
            // }

            $manager->persist($prof);
        }
        $manager->flush();
    }


}
