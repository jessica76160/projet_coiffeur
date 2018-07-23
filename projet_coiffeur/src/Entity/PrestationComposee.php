<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationComposeeRepository")
 */
class PrestationComposee
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
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $tarif;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salon", inversedBy="prestationsComposee",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $salon;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Coiffeur", mappedBy="prestationsComposee",cascade={"persist"})
     */
    private $coiffeurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prestation", mappedBy="prestationsComposee",cascade={"persist"})
     */
    private $prestations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PrestationClient", mappedBy="prestationsComposee")
     */
    private $prestationClients;

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
        $this->prestationsClient = new ArrayCollection();
        $this->coiffeurs = new ArrayCollection();
        $this->prestations = new ArrayCollection();
        $this->prestationClients = new ArrayCollection();
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

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif($tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getSalon(): ?Salon
    {
        return $this->salon;
    }

    public function setSalon(?Salon $salon): self
    {
        $this->salon = $salon;

        return $this;
    }

    /**
     * @return Collection|Coiffeur[]
     */
    public function getCoiffeurs(): Collection
    {
        return $this->coiffeurs;
    }

    public function addCoiffeur(Coiffeur $coiffeur): self
    {
        if (!$this->coiffeurs->contains($coiffeur)) {
            $this->coiffeurs[] = $coiffeur;
            $coiffeur->addPrestationsComposee($this);
        }

        return $this;
    }

    public function removeCoiffeur(Coiffeur $coiffeur): self
    {
        if ($this->coiffeurs->contains($coiffeur)) {
            $this->coiffeurs->removeElement($coiffeur);
            $coiffeur->removePrestationsComposee($this);
        }

        return $this;
    }

    /**
     * @return Collection|Prestation[]
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestation $prestation): self
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations[] = $prestation;
            $prestation->addPrestationsComposee($this);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): self
    {
        if ($this->prestations->contains($prestation)) {
            $this->prestations->removeElement($prestation);
            $prestation->removePrestationsComposee($this);
        }

        return $this;
    }

    /**
     * @return Collection|PrestationClient[]
     */
    public function getPrestationClients(): Collection
    {
        return $this->prestationClients;
    }

    public function addPrestationClient(PrestationClient $prestationClient): self
    {
        if (!$this->prestationClients->contains($prestationClient)) {
            $this->prestationClients[] = $prestationClient;
            $prestationClient->addPrestationsComposee($this);
        }

        return $this;
    }

    public function removePrestationClient(PrestationClient $prestationClient): self
    {
        if ($this->prestationClients->contains($prestationClient)) {
            $this->prestationClients->removeElement($prestationClient);
            $prestationClient->removePrestationsComposee($this);
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
