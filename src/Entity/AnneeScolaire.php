<?php

namespace App\Entity;

use App\Repository\AnneeScolaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeScolaireRepository::class)]
class AnneeScolaire 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Inscription::class, inversedBy: 'anneeScolaires')]
    private $Inscriptions;

    #[ORM\OneToMany(mappedBy: 'anneeScolaire', targetEntity: inscription::class)]
    private $inscriptions;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInscriptions(): ?Inscription
    {
        return $this->Inscriptions;
    }

    public function setInscriptions(?Inscription $Inscriptions): self
    {
        $this->Inscriptions = $Inscriptions;

        return $this;
    }

    public function addInscription(inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setAnneeScolaire($this);
        }

        return $this;
    }

    public function removeInscription(inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getAnneeScolaire() === $this) {
                $inscription->setAnneeScolaire(null);
            }
        }

        return $this;
    }
}
