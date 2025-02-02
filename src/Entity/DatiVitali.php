<?php

namespace App\Entity;

use App\Repository\DatiVitaliRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DatiVitaliRepository::class)]
class DatiVitali
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'datiVitali', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Anagrafica $anagraficaId = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dataDiNascita = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dataDiMorte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnagraficaId(): ?Anagrafica
    {
        return $this->anagraficaId;
    }

    public function setAnagraficaId(Anagrafica $anagraficaId): static
    {
        $this->anagraficaId = $anagraficaId;

        return $this;
    }

    public function getDataDiNascita(): ?\DateTimeInterface
    {
        return $this->dataDiNascita;
    }

    public function setDataDiNascita(?\DateTimeInterface $dataDiNascita): static
    {
        $this->dataDiNascita = $dataDiNascita;

        return $this;
    }

    public function getDataDiMorte(): ?\DateTimeInterface
    {
        return $this->dataDiMorte;
    }

    public function setDataDiMorte(?\DateTimeInterface $dataDiMorte): static
    {
        $this->dataDiMorte = $dataDiMorte;

        return $this;
    }
}
