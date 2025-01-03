<?php

namespace App\Entity;

use App\Repository\FaldoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaldoneRepository::class)]
class Faldone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descrizione = null;

    #[ORM\Column(length: 50)]
    private ?string $classificazione = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $note = null;

    /**
     * @var Collection<int, Fascicolo>
     */
    #[ORM\OneToMany(targetEntity: Fascicolo::class, mappedBy: 'faldone')]
    private Collection $fascicoli;

    #[ORM\ManyToOne(inversedBy: 'faldoni')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Archivio $archivio = null;

    public function __construct()
    {
        $this->fascicoli = new ArrayCollection();
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

    public function getClassificazione(): ?string
    {
        return $this->classificazione;
    }

    public function setClassificazione(string $classificazione): static
    {
        $this->classificazione = $classificazione;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

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
            $fascicoli->setFaldone($this);
        }

        return $this;
    }

    public function removeFascicoli(Fascicolo $fascicoli): static
    {
        if ($this->fascicoli->removeElement($fascicoli)) {
            // set the owning side to null (unless already changed)
            if ($fascicoli->getFaldone() === $this) {
                $fascicoli->setFaldone(null);
            }
        }

        return $this;
    }

    public function getArchivio(): ?Archivio
    {
        return $this->archivio;
    }

    public function setArchivio(?Archivio $archivio): static
    {
        $this->archivio = $archivio;

        return $this;
    }
}
