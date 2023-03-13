<?php

namespace App\Entity;

use App\Repository\BeateauCategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeateauCategorieRepository::class)]
class BeateauCategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbMax = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    private ?Bateau $bateau = null;

    #[ORM\ManyToOne(inversedBy: 'bateaux')]
    private ?Categorie $categorie = null;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbMax(): ?int
    {
        return $this->nbMax;
    }

    public function setNbMax(int $nbMax): self
    {
        $this->nbMax = $nbMax;

        return $this;
    }

    public function getBeateau(): ?Beateau
    {
        return $this->beateau;
    }

    public function setBeateau(?Beateau $beateau): self
    {
        $this->beateau = $beateau;

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
}
