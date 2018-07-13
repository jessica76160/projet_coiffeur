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

    public function __construct()
    {
        $this->prestationsClient = new ArrayCollection();
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
}
