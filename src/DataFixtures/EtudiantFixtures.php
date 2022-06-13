<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $nomComplet=['cheikh Tidiane','Mamadou','Fatyraza'];
        $matricules=['NOO','N00','NOO'];
        $sexes=['M','F','M'];
        $email=['diop@gmial.com','Fall@gmial.com','Mbaye@gmial.com'];
        $password=['diop','Fall','Mbaye'];
        $addresses=['Thies','Fass','Dakar'];
        for ($i=0; $i <10 ; $i++) { 
            # code...
            $etudiant= new Etudiant;
            $rand=rand(0,2);
            $etudiant ->setNomComplet($nomComplet[$rand])
            ->setNomComplet($nomComplet[$rand])
                      ->setEmail("admin".$i."@gmail.com")
                      ->setPassword($this->hacher->hashPassword($etudiant,"passer"))
                     ->setRoles(["ROLE_ETUDIANT"])
                     ->setMatricule($matricules[$rand])
                    ->setSexe($sexes[$rand])
                   ->setAdresse($addresses[$rand]);
            $manager->persist($etudiant);
            $this->addReference('etudiant'.$i,$etudiant);
    }
    $manager->flush();

}
}