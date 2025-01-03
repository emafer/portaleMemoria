<?php

namespace App\Entity;

use App\Repository\InternatoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InternatoRepository::class)]
class Internato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Anagrafica $anagrafica = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $mortoShoah = null;

    /**
     * @var Collection<int, Fascicolo>
     */
    #[ORM\ManyToMany(targetEntity: Fascicolo::class, inversedBy: 'internati')]
    private Collection $fascicoli;

    public function __construct()
    {
        $this->fascicoli = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(Anagrafica $anagrafica): static
    {
        $this->anagrafica = $anagrafica;

        return $this;
    }

    public function getMortoShoah(): ?int
    {
        return $this->mortoShoah;
    }

    public function setMortoShoah(int $mortoShoah): static
    {
        $this->mortoShoah = $mortoShoah;

        return $this;
    }

    /**
     * @return Collection<int, Fascicolo>
     */
    public function getFascicoli(): Collection
    {
        return $this->fascicoli;
    }

    public function addFascicoli(Fascicolo $fascicoli): static
    {
        if (!$this->fascicoli->contains($fascicoli)) {
            $this->fascicoli->add($fascicoli);
        }

        return $this;
    }

    public function removeFascicoli(Fascicolo $fascicoli): static
    {
        $this->fascicoli->removeElement($fascicoli);

        return $this;
    }
}
