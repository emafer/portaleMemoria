<?php

namespace App\Entity;

use App\Repository\ComuneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComuneRepository::class)]
class Comune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'comuni')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Provincia $provinciaId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stato $statoId = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvinciaId(): ?Provincia
    {
        return $this->provinciaId;
    }

    public function setProvinciaId(?Provincia $provinciaId): static
    {
        $this->provinciaId = $provinciaId;

        return $this;
    }

    public function getStatoId(): ?Stato
    {
        return $this->statoId;
    }

    public function setStatoId(?Stato $statoId): static
    {
        $this->statoId = $statoId;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }
}
