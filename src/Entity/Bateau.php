<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $longueur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?float $vitesse = null;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: Traversee::class)]
    private Collection $traversees;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: BateauEquipement::class)]
    private Collection $equipements;

    #[ORM\OneToMany(mappedBy: 'bateau', targetEntity: BeateauCategorie::class)]
    private Collection $categories;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->equipements = new ArrayCollection();
        $this->categories = new ArrayCollection();
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

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getVitesse(): ?float
    {
        return $this->vitesse;
    }

    public function setVitesse(float $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * @return Collection<int, Traversee>
     */
    public function getTraversees(): Collection
    {
        return $this->traversees;
    }

    public function addTraversee(Traversee $traversee): self
    {
        if (!$this->traversees->contains($traversee)) {
            $this->traversees->add($traversee);
            $traversee->setBateau($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getBateau() === $this) {
                $traversee->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Proposer>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Proposer $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements->add($equipement);
            $equipement->setBateau($this);
        }

        return $this;
    }

    public function removeEquipement(Proposer $equipement): self
    {
        if ($this->equipements->removeElement($equipement)) {
            // set the owning side to null (unless already changed)
            if ($equipement->getBateau() === $this) {
                $equipement->setBateau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contenir>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Contenir $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setBateau($this);
        }

        return $this;
    }

    public function removeCategory(Contenir $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getBateau() === $this) {
                $category->setBateau(null);
            }
        }

        return $this;
    }
}
