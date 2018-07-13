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
     * @ORM\OneToMany(targetEntity="App\Entity\PrestationClient", mappedBy="prestationComposee")
     */
    private $prestationsClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salon", inversedBy="prestationsComposee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salon;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Coiffeur", mappedBy="prestationsComposee")
     */
    private $coiffeurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Prestation", mappedBy="prestationsComposee")
     */
    private $prestations;

    public function __construct()
    {
        $this->prestationsClient = new ArrayCollection();
        $this->coiffeurs = new ArrayCollection();
        $this->prestations = new ArrayCollection();
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

    /**
     * @return Collection|PrestationClient[]
     */
    public function getPrestationsClient(): Collection
    {
        return $this->prestationsClient;
    }

    public function addPrestationsClient(PrestationClient $prestationsClient): self
    {
        if (!$this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient[] = $prestationsClient;
            $prestationsClient->setPrestationComposee($this);
        }

        return $this;
    }

    public function removePrestationsClient(PrestationClient $prestationsClient): self
    {
        if ($this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient->removeElement($prestationsClient);
            // set the owning side to null (unless already changed)
            if ($prestationsClient->getPrestationComposee() === $this) {
                $prestationsClient->setPrestationComposee(null);
            }
        }

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
}
