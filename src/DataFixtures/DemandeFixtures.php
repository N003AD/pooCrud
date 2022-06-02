<?php

namespace App\DataFixtures;

use App\Entity\Demande;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DemandeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $motifs=['Malade','Releve','Releve'];
        $etats=['En cours','Terminé','Traite'];
        for ($i=0; $i <10 ; $i++) { 
            # code...
            $demande= new Demande;
            $rand=rand(0,2);
            $demande->setMotif($motifs[$rand])
                   ->setEtat($etats[$rand]);
            $manager->persist($demande);
            $this->addReference('demande'.$i,$demande);
        }
        $manager->flush();
    }
}
