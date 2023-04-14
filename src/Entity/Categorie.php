<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Type::class)]
    private Collection $types;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: BateauCategorie::class)]
    private Collection $bateaux;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->bateaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
            $type->setCategorie($this);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getCategorie() === $this) {
                $type->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BateauCategorie>
     */
    public function getBateaux(): Collection
    {
        return $this->bateaux;
    }

    public function addBateaux(BateauCategorie $bateaux): self
    {
        if (!$this->bateaux->contains($bateaux)) {
            $this->bateaux->add($bateaux);
            $bateaux->setCategorie($this);
        }

        return $this;
    }

    public function removeBateaux(BateauCategorie $bateaux): self
    {
        if ($this->bateaux->removeElement($bateaux)) {
            // set the owning side to null (unless already changed)
            if ($bateaux->getCategorie() === $this) {
                $bateaux->setCategorie(null);
            }
        }

        return $this;
    }
}
