<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
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
     * @ORM\Column(type="integer")
     */
    private $codeP;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom2;

    /**
     * @ORM\Column(type="integer")
     */
    private $factureNb;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montantP;

   

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Factures",cascade={"remove","persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="facture",cascade={"persist"})
     */
    private $Articles;

    public function __construct()
    {
        $this->Articles = new ArrayCollection();
    }

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodeP(): ?int
    {
        return $this->codeP;
    }

    public function setCodeP(int $codeP): self
    {
        $this->codeP = $codeP;

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

    public function getNom2(): ?string
    {
        return $this->nom2;
    }

    public function setNom2(string $nom2): self
    {
        $this->nom2 = $nom2;

        return $this;
    }

    public function getFactureNb(): ?int
    {
        return $this->factureNb;
    }

    public function setFactureNb(int $factureNb): self
    {
        $this->factureNb = $factureNb;

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

    public function getMontantP(): ?float
    {
        return $this->montantP;
    }

    public function setMontantP(?float $montantP): self
    {
        $this->montantP = $montantP;

        return $this;
    }


    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->Articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->Articles->contains($article)) {
            $this->Articles[] = $article;
            $article->setFacture($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Articles->contains($article)) {
            $this->Articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getFacture() === $this) {
                $article->setFacture(null);
            }
        }

        return $this;
    }
    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
