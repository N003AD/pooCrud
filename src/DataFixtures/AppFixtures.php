<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Professeur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // for ($i=0; $i < 10; $i++) { 
        //     # code...
        //     $module= new Module();
        //     $module->setLibelle('module'.$i);
        //     $manager->persist($module);

      

        $manager->flush();
    }
}
