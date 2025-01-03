<?php

namespace App\Entity;

use App\Repository\IndirizzoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IndirizzoRepository::class)]
class Indirizzo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end = null;

    #[ORM\Column(length: 255)]
    private ?string $indirizzo = null;

    #[ORM\ManyToOne]
    private ?Comune $comune = null;

    #[ORM\ManyToOne(inversedBy: 'indirizzi')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Anagrafica $anagrafica = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): static
    {
        $this->end = $end;

        return $this;
    }

    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    public function setIndirizzo(string $indirizzo): static
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    public function getComune(): ?Comune
    {
        return $this->comune;
    }

    public function setComune(?Comune $comune): static
    {
        $this->comune = $comune;

        return $this;
    }

    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    public function setAnagrafica(?Anagrafica $anagrafica): static
    {
        $this->anagrafica = $anagrafica;

        return $this;
    }
}
