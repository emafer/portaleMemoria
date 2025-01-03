<?php

namespace App\Entity;

use App\Repository\TipoRelazioneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoRelazioneRepository::class)]
class TipoRelazione
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\OneToOne(targetEntity: self::class, cascade: ['persist', 'remove'])]
    private ?self $opposto = null;

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

    public function getOpposto(): ?self
    {
        return $this->opposto;
    }

    public function setOpposto(?self $opposto): static
    {
        $this->opposto = $opposto;

        return $this;
    }
}
