<?php

namespace App\Entity;

use App\Repository\StatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatoRepository::class)]
class Stato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $cittadinanza = null;

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

    public function getCittadinanza(): ?string
    {
        return $this->cittadinanza;
    }

    public function setCittadinanza(string $cittadinanza): static
    {
        $this->cittadinanza = $cittadinanza;

        return $this;
    }
}
