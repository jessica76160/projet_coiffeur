<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoiffeurRepository")
 */
class Coiffeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Disponibilite", mappedBy="coiffeur")
     */
    private $disponibilites;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PrestationComposee", inversedBy="coiffeurs")
     */
    private $prestationsComposee;

    public function __construct()
    {
        $this->disponibilites = new ArrayCollection();
        $this->prestationsComposee = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Disponibilite[]
     */
    public function getDisponibilites(): Collection
    {
        return $this->disponibilites;
    }

    public function addDisponibilite(Disponibilite $disponibilite): self
    {
        if (!$this->disponibilites->contains($disponibilite)) {
            $this->disponibilites[] = $disponibilite;
            $disponibilite->setCoiffeur($this);
        }

        return $this;
    }

    public function removeDisponibilite(Disponibilite $disponibilite): self
    {
        if ($this->disponibilites->contains($disponibilite)) {
            $this->disponibilites->removeElement($disponibilite);
            // set the owning side to null (unless already changed)
            if ($disponibilite->getCoiffeur() === $this) {
                $disponibilite->setCoiffeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PrestationComposee[]
     */
    public function getPrestationsComposee(): Collection
    {
        return $this->prestationsComposee;
    }

    public function addPrestationsComposee(PrestationComposee $prestationsComposee): self
    {
        if (!$this->prestationsComposee->contains($prestationsComposee)) {
            $this->prestationsComposee[] = $prestationsComposee;
        }

        return $this;
    }

    public function removePrestationsComposee(PrestationComposee $prestationsComposee): self
    {
        if ($this->prestationsComposee->contains($prestationsComposee)) {
            $this->prestationsComposee->removeElement($prestationsComposee);
        }

        return $this;
    }
}
