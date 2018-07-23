<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationRepository")
 */
class Prestation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $tarif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etape", mappedBy="prestation",cascade={"persist"})
     */
    private $etapes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PrestationComposee", inversedBy="prestations")
     */
    private $prestationsComposee;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $type_cheveux;

    public function __construct()
    {
        $this->etapes = new ArrayCollection();
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

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif($tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * @return Collection|Etape[]
     */
    public function getEtapes(): Collection
    {
        return $this->etapes;
    }

    public function addEtape(Etape $etape): self
    {
        if (!$this->etapes->contains($etape)) {
            $this->etapes[] = $etape;
            $etape->setPrestation($this);
        }

        return $this;
    }

    public function removeEtape(Etape $etape): self
    {
        if ($this->etapes->contains($etape)) {
            $this->etapes->removeElement($etape);
            // set the owning side to null (unless already changed)
            if ($etape->getPrestation() === $this) {
                $etape->setPrestation(null);
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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getTypeCheveux(): ?string
    {
        return $this->type_cheveux;
    }

    public function setTypeCheveux(string $type_cheveux): self
    {
        $this->type_cheveux = $type_cheveux;

        return $this;
    }
}
