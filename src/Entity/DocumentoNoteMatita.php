<?php

namespace App\Entity;

use App\Repository\DocumentoNoteMatitaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentoNoteMatitaRepository::class)]
class DocumentoNoteMatita
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $testoNotaMatita = null;

    #[ORM\ManyToOne(inversedBy: 'NoteAMatita')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $documento = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestoNotaMatita(): ?string
    {
        return $this->testoNotaMatita;
    }

    public function setTestoNotaMatita(string $testoNotaMatita): static
    {
        $this->testoNotaMatita = $testoNotaMatita;

        return $this;
    }

    public function getDocumento(): ?Documento
    {
        return $this->documento;
    }

    public function setDocumento(?Documento $documento): static
    {
        $this->documento = $documento;

        return $this;
    }
}
