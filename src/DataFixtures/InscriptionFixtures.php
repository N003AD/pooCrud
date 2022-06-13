<?php

namespace App\DataFixtures;

use App\Entity\Inscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InscriptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $data= new Inscription;
        for ($i = 1; $i <=10; $i++) {
            $annee=rand(2019,2020);
            $data->setAnneeScolaire($this->getReference("AnneeScolaire".$annee));
            // $data ->setClasse($this->getReference("Classe".$i));
            $data->setEtudiant($this->getReference("E
            $manager->persist(tudiant".$i));

            $this->addReference("Inscription".$i,$data);
            }
            $manager->flush();
    }
}
