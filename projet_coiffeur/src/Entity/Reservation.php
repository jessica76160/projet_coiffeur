<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $numero;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $tarif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="reservations")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PrestationClient", mappedBy="reservation")
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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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
            $prestationsClient->setReservation($this);
        }

        return $this;
    }

    public function removePrestationsClient(PrestationClient $prestationsClient): self
    {
        if ($this->prestationsClient->contains($prestationsClient)) {
            $this->prestationsClient->removeElement($prestationsClient);
            // set the owning side to null (unless already changed)
            if ($prestationsClient->getReservation() === $this) {
                $prestationsClient->setReservation(null);
            }
        }

        return $this;
    }

}
