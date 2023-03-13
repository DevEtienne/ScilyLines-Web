<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: BateauEquipement::class)]
    private Collection $bateaux;

    public function __construct()
    {
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
     * @return Collection<int, Proposer>
     */
    public function getBateaux(): Collection
    {
        return $this->bateaux;
    }

    public function addBateaux(Proposer $bateaux): self
    {
        if (!$this->bateaux->contains($bateaux)) {
            $this->bateaux->add($bateaux);
            $bateaux->setEquipement($this);
        }

        return $this;
    }

    public function removeBateaux(Proposer $bateaux): self
    {
        if ($this->bateaux->removeElement($bateaux)) {
            // set the owning side to null (unless already changed)
            if ($bateaux->getEquipement() === $this) {
                $bateaux->setEquipement(null);
            }
        }

        return $this;
    }
}
