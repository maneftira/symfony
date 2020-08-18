<?php

namespace App\Entity;

use App\Repository\AutoEntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutoEntrepriseRepository::class)
 */
class AutoEntreprise
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationnalite;

    /**
     * @ORM\Column(type="date")
     */
    private $DateN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LieuN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipalite;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseAffaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $municipaliteAffaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostalAffaire;

    /**
     * @ORM\Column(type="date")
     */
    private $dateActivite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $saisonniere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activites;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSecScoiale;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activiteSimulat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $regimeAssurance;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeDemande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fait;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sex;

    public function getId(): ?int
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNationnalite(): ?string
    {
        return $this->nationnalite;
    }

    public function setNationnalite(string $nationnalite): self
    {
        $this->nationnalite = $nationnalite;

        return $this;
    }

    public function getDateN(): ?\DateTimeInterface
    {
        return $this->DateN;
    }

    public function setDateN(\DateTimeInterface $DateN): self
    {
        $this->DateN = $DateN;

        return $this;
    }

    public function getLieuN(): ?string
    {
        return $this->LieuN;
    }

    public function setLieuN(string $LieuN): self
    {
        $this->LieuN = $LieuN;

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

    public function getMunicipalite(): ?string
    {
        return $this->municipalite;
    }

    public function setMunicipalite(string $municipalite): self
    {
        $this->municipalite = $municipalite;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getAdresseAffaire(): ?string
    {
        return $this->adresseAffaire;
    }

    public function setAdresseAffaire(string $adresseAffaire): self
    {
        $this->adresseAffaire = $adresseAffaire;

        return $this;
    }

    public function getMunicipaliteAffaire(): ?string
    {
        return $this->municipaliteAffaire;
    }

    public function setMunicipaliteAffaire(string $municipaliteAffaire): self
    {
        $this->municipaliteAffaire = $municipaliteAffaire;

        return $this;
    }

    public function getCodePostalAffaire(): ?int
    {
        return $this->codePostalAffaire;
    }

    public function setCodePostalAffaire(int $codePostalAffaire): self
    {
        $this->codePostalAffaire = $codePostalAffaire;

        return $this;
    }

    public function getDateActivite(): ?\DateTimeInterface
    {
        return $this->dateActivite;
    }

    public function setDateActivite(\DateTimeInterface $dateActivite): self
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getSaisonniere(): ?bool
    {
        return $this->saisonniere;
    }

    public function setSaisonniere(bool $saisonniere): self
    {
        $this->saisonniere = $saisonniere;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getActivites(): ?string
    {
        return $this->activites;
    }

    public function setActivites(string $activites): self
    {
        $this->activites = $activites;

        return $this;
    }

    public function getNumSecScoiale(): ?int
    {
        return $this->numSecScoiale;
    }

    public function setNumSecScoiale(int $numSecScoiale): self
    {
        $this->numSecScoiale = $numSecScoiale;

        return $this;
    }

   

    public function getActiviteSimulat(): ?string
    {
        return $this->activiteSimulat;
    }

    public function setActiviteSimulat(string $activiteSimulat): self
    {
        $this->activiteSimulat = $activiteSimulat;

        return $this;
    }

    public function getRegimeAssurance(): ?string
    {
        return $this->regimeAssurance;
    }

    public function setRegimeAssurance(string $regimeAssurance): self
    {
        $this->regimeAssurance = $regimeAssurance;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(int $fax): self
    {
        $this->fax = $fax;

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

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(?int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getTypeDemande(): ?string
    {
        return $this->TypeDemande;
    }

    public function setTypeDemande(string $TypeDemande): self
    {
        $this->TypeDemande = $TypeDemande;

        return $this;
    }

    public function getFait(): ?string
    {
        return $this->fait;
    }

    public function setFait(?string $fait): self
    {
        $this->fait = $fait;

        return $this;
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

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }
}
