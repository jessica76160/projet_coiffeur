<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalonRepository")
 */
class Salon
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $code_postale;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $horaire;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $perimetre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PrestationComposee", mappedBy="salon",cascade={"persist"})
     */
    private $prestationsComposee;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Coiffeur", mappedBy="salon",cascade={"persist"})
     */
    private $coiffeurs;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;


    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $longitude;


    public function __construct()
    {
        $this->prestationsComposee = new ArrayCollection();
        $this->coiffeurs = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostale(): ?string
    {
        return $this->code_postale;
    }

    public function setCodePostale(string $code_postale): self
    {
        $this->code_postale = $code_postale;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getPerimetre()
    {
        return $this->perimetre;
    }

    public function setPerimetre($perimetre): self
    {
        $this->perimetre = $perimetre;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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
            $prestationsComposee->setSalon($this);
        }

        return $this;
    }

    public function removePrestationsComposee(PrestationComposee $prestationsComposee): self
    {
        if ($this->prestationsComposee->contains($prestationsComposee)) {
            $this->prestationsComposee->removeElement($prestationsComposee);
            // set the owning side to null (unless already changed)
            if ($prestationsComposee->getSalon() === $this) {
                $prestationsComposee->setSalon(null);
            }
        }

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
            $coiffeur->setSalon($this);
        }

        return $this;
    }

    public function removeCoiffeur(Coiffeur $coiffeur): self
    {
        if ($this->coiffeurs->contains($coiffeur)) {
            $this->coiffeurs->removeElement($coiffeur);
            // set the owning side to null (unless already changed)
            if ($coiffeur->getSalon() === $this) {
                $coiffeur->setSalon(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}
