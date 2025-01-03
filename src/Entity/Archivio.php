<?php

namespace App\Entity;

use App\Repository\ArchivioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArchivioRepository::class)]
class Archivio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descrizione = null;

    #[ORM\Column(length: 40)]
    private ?string $abbr = null;

    /**
     * @var Collection<int, Faldone>
     */
    #[ORM\OneToMany(targetEntity: Faldone::class, mappedBy: 'archivio')]
    private Collection $faldoni;

    public function __construct()
    {
        $this->faldoni = new ArrayCollection();
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
     * @return Collection<int, Faldone>
     */
    public function getFaldoni(): Collection
    {
        return $this->faldoni;
    }

    public function addFaldoni(Faldone $faldoni): static
    {
        if (!$this->faldoni->contains($faldoni)) {
            $this->faldoni->add($faldoni);
            $faldoni->setArchivio($this);
        }

        return $this;
    }

    public function removeFaldoni(Faldone $faldoni): static
    {
        if ($this->faldoni->removeElement($faldoni)) {
            // set the owning side to null (unless already changed)
            if ($faldoni->getArchivio() === $this) {
                $faldoni->setArchivio(null);
            }
        }

        return $this;
    }
}
