<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant  extends User
{

    #[ORM\Column(type: 'string', length: 255)]
    private $matricule;

    #[ORM\Column(type: 'string', length: 255)]
    private $sexe;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: inscription::class)]
    private $insccriptions;


    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->insccriptions = new ArrayCollection();
    }


    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, inscription>
     */
    public function getInsccriptions(): Collection
    {
        return $this->insccriptions;
    }

    public function addInsccription(inscription $insccription): self
    {
        if (!$this->insccriptions->contains($insccription)) {
            $this->insccriptions[] = $insccription;
            $insccription->setEtudiant($this);
        }

        return $this;
    }

    public function removeInsccription(inscription $insccription): self
    {
        if ($this->insccriptions->removeElement($insccription)) {
            // set the owning side to null (unless already changed)
            if ($insccription->getEtudiant() === $this) {
                $insccription->setEtudiant(null);
            }
        }

        return $this;
    }



}
