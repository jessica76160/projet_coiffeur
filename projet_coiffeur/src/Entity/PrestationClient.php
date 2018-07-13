<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationClientRepository")
 */
class PrestationClient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_debut;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_fin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservation", inversedBy="prestationsClient")
     */
    private $reservation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Disponibilite", inversedBy="prestationsClient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $disponibilite;

    public function getId()
    {
        return $this->id;
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

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getDisponibilite(): ?Disponibilite
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?Disponibilite $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }
}
