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

        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 10; $i++) { 
            # code...
            $prof= new Professeur();
            $prof->setNomComplet('prof'.$i);
            $prof->setGrade('prof'.$i);
        for ($j=0; $j < 2; $j++) { 
                # code...
                $ref=rand(0,9);
                $prof->addClass($this->getReference('classe'.$ref));
            }

            foreach ($modules as $module) {
                # code...
                $newModule = new Module;
                $newModule->setLibelle($module);
                $prof->addModule($newModule);
            }

            $manager->persist($prof);
        }
        $manager->flush();
    }


}
