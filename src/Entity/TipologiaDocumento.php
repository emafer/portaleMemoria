<?php

namespace App\Entity;

use App\Repository\TipologiaDocumentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipologiaDocumentoRepository::class)]
class TipologiaDocumento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $descrizione = null;

    #[ORM\Column(length: 4)]
    private ?string $abbr = null;

    /**
     * @var Collection<int, Documento>
     */
    #[ORM\OneToMany(targetEntity: Documento::class, mappedBy: 'tipologiaDocumento')]
    private Collection $documenti;

    public function __construct()
    {
        $this->documenti = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(string $descrizione): static
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    public function getAbbr(): ?string
    {
        return $this->abbr;
    }

    public function setAbbr(string $abbr): static
    {
        $this->abbr = $abbr;

        return $this;
    }

    /**
     * @return Collection<int, Documento>
     */
    public function getDocumenti(): Collection
    {
        return $this->documenti;
    }

    public function addDocumenti(Documento $documenti): static
    {
        if (!$this->documenti->contains($documenti)) {
            $this->documenti->add($documenti);
            $documenti->setTipologiaDocumento($this);
        }

        return $this;
    }

    public function removeDocumenti(Documento $documenti): static
    {
        if ($this->documenti->removeElement($documenti)) {
            // set the owning side to null (unless already changed)
            if ($documenti->getTipologiaDocumento() === $this) {
                $documenti->setTipologiaDocumento(null);
            }
        }

        return $this;
    }
}
