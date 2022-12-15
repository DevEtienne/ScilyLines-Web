<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Traversee $traversee = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Participer::class)]
    private Collection $types;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTraversee(): ?Traversee
    {
        return $this->traversee;
    }

    public function setTraversee(?Traversee $traversee): self
    {
        $this->traversee = $traversee;

        return $this;
    }

    /**
     * @return Collection<int, Participer>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Participer $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
            $type->setReservation($this);
        }

        return $this;
    }

    public function removeType(Participer $type): self
    {
        if ($this->types->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getReservation() === $this) {
                $type->setReservation(null);
            }
        }

        return $this;
    }
}
