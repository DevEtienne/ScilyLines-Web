<?php

namespace App\Entity;

use App\Repository\LiaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LiaisonRepository::class)]
class Liaison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duree = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Traversee::class)]
    private Collection $traversees;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Port $port = null;

    #[ORM\ManyToOne(inversedBy: 'liaisons')]
    private ?Secteur $secteur = null;

    #[ORM\OneToMany(mappedBy: 'liaison', targetEntity: Tarifer::class)]
    private Collection $tarifers;

    public function __construct()
    {
        $this->traversees = new ArrayCollection();
        $this->tarifers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

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
            $traversee->setLiaison($this);
        }

        return $this;
    }

    public function removeTraversee(Traversee $traversee): self
    {
        if ($this->traversees->removeElement($traversee)) {
            // set the owning side to null (unless already changed)
            if ($traversee->getLiaison() === $this) {
                $traversee->setLiaison(null);
            }
        }

        return $this;
    }

    public function getPort(): ?Port
    {
        return $this->port;
    }

    public function setPort(?Port $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

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
            $tarifer->setLiaison($this);
        }

        return $this;
    }

    public function removeTarifer(Tarifer $tarifer): self
    {
        if ($this->tarifers->removeElement($tarifer)) {
            // set the owning side to null (unless already changed)
            if ($tarifer->getLiaison() === $this) {
                $tarifer->setLiaison(null);
            }
        }

        return $this;
    }
}
