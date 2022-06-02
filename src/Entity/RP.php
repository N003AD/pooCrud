<?php

namespace App\Entity;

use App\Repository\RPRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RPRepository::class)]
class RP extends User
{
    public function __construct()
    {
        $this->demandes = new ArrayCollection();
        $this->classes = new ArrayCollection();
    }

    /**
     * @return Collection<int, demande>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setRP($this);
        }

        return $this;
    }

    public function removeDemande(demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getRP() === $this) {
                $demande->setRP(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
            $class->setRP($this);
        }

        return $this;
    }

    public function removeClass(classe $class): self
    {
        if ($this->classes->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getRP() === $this) {
                $class->setRP(null);
            }
        }

        return $this;
    }
}
