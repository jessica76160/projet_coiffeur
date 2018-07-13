<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DisponibiliteRepository")
 */
class Disponibilite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_debut;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_fin;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $etat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PrestationClient", mappedBy="disponibilite",cascade={"persist"})
     */
    private $prestationsClient;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Coiffeur", inversedBy="disponibilites",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $coiffeur;

    public function __construct()
    {
        $this->prestationsClient = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heure_debut;
    }

    public function setHeureDebut(\DateTimeInterface $heure_debut): self
    {
        $this->heure_debut = $heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $heure_fin): self
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

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
            $prestationsClient->setDisponibilite($this);
        }

        return $this;
    }

    public function removePrestationsClient(PrestationClient $prestationsClient): self
    {
        if ($this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient->removeElement($prestationsClient);
            // set the owning side to null (unless already changed)
            if ($prestationsClient->getDisponibilite() === $this) {
                $prestationsClient->setDisponibilite(null);
            }
        }

        return $this;
    }

    public function getCoiffeur(): ?Coiffeur
    {
        return $this->coiffeur;
    }

    public function setCoiffeur(?Coiffeur $coiffeur): self
    {
        $this->coiffeur = $coiffeur;

        return $this;
    }
}
