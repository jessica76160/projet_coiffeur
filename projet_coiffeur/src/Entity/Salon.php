<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalonRepository")
 * * @UniqueEntity(fields="email", message="Email déjà pris")
 * @UniqueEntity(fields="username", message="Username déjà pris")
 */
class Salon implements UserInterface, \Serializable
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

    private $username;

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
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PrestationComposee", mappedBy="salon",cascade={"persist"})
     */
    private $prestationsComposee;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Coiffeur", mappedBy="salon",cascade={"persist"})
     */
    private $coiffeurs;
    private $roles = [];

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
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $nom): self
    {
        $this->username = $nom;

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
     /**
     * Retourne les rôles de l'user
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
 
        // Afin d'être sûr qu'un user a toujours au moins 1 rôle
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
 
        return array_unique($roles);
    }
 
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
    /**
     * Retour le salt qui a servi à coder le mot de passe
     *
     * {@inheritdoc}
     */
    public function getSalt(): ?string
    {
        // See "Do you need to use a Salt?" at https://symfony.com/doc/current/cookbook/security/entity_provider.html
        // we're using bcrypt in security.yml to encode the password, so
        // the salt value is built-in and you don't have to generate one
 
        return null;
    }
 
    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // Nous n'avons pas besoin de cette methode car nous n'utilions pas de plainPassword
        // Mais elle est obligatoire car comprise dans l'interface UserInterface
        // $this->plainPassword = null;
    }
 
    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        return serialize([$this->id, $this->username, $this->password]);
    }
 
    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        [$this->id, $this->username, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }
}
