<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'types')]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: ReservationType::class)]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Tarifer::class)]
    private Collection $tarifers;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Participer>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Participer $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setType($this);
        }

        return $this;
    }

    public function removeReservation(Participer $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getType() === $this) {
                $reservation->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarifer>
     */
    public function getTarifers(): Collection
    {
        return $this->tarifers;
    }

    public function addTarifer(Tarifer $tarifer): self
    {
        if (!$this->tarifers->contains($tarifer)) {
            $this->tarifers->add($tarifer);
            $tarifer->setType($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getType() === $this) {
                $tarifer->setType(null);
            }
        }

        return $this;
    }
}
