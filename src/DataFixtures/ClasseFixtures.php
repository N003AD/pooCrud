<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $filieres=['Dev Web','Dev Mobile','Dev Web Mobile'];
        $niveaux=['L1','L2','Master2'];
        for ($i=0; $i <10 ; $i++) { 
            # code...
            $classe= new Classe;
            $rand=rand(0,2);
            $classe->setFiliere($filieres[$rand])
                   ->setNiveau($niveaux[$rand])
                   ->setLibelle($niveaux[$rand].' '.$filieres[$rand]);
            $manager->persist($classe);
            $this->addReference('classe'.$i,$classe);
        }

        $manager->flush();
    }
}
