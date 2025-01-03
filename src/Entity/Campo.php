<?php

namespace App\Entity;

use App\Repository\CampoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampoRepository::class)]
class Campo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dataCreazione = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comune $comune = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDataCreazione(): ?\DateTimeInterface
    {
        return $this->dataCreazione;
    }

    public function setDataCreazione(?\DateTimeInterface $dataCreazione): static
    {
        $this->dataCreazione = $dataCreazione;

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
}
