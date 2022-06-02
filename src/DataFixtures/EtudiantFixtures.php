<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $matricules=['NOO','DM90','MW56'];
        $sexes=['M','F','M'];
        $addrsses=['Thies','Fass','Dakar'];
        for ($i=0; $i <10 ; $i++) { 
            # code...
            $etudiant= new Etudiant;
            $rand=rand(0,2);
            $etudiant->setMatricule($matricules[$rand])
                   ->setSexe($sexes[$rand])
                   ->setAdresse($addrsses[$rand]);
            $manager->persist($etudiant);
            $this->addReference('etudiant'.$i,$etudiant);

            
        }
        $manager->flush();
    }
}
