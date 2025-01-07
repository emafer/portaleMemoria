<?php

namespace App\Entity;

use App\Repository\AnagraficaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnagraficaRepository::class)]
class Anagrafica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cognome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $secondoNome = null;

    #[ORM\OneToOne(mappedBy: 'anagraficaId', cascade: ['persist', 'remove'])]
    private ?DatiVitali $datiVitali = null;

    /**
     * @var Collection<int, Indirizzo>
     */
    #[ORM\OneToMany(targetEntity: Indirizzo::class, mappedBy: 'anagrafica', orphanRemoval: true)]
    private Collection $indirizzi;

    public function __construct()
    {
        $this->indirizzi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): static
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }


    public function getSecondoNome(): ?string
    {
        return $this->secondoNome;
    }

    public function setSecondoNome(?string $secondoNome): static
    {
        $this->secondoNome = $secondoNome;

        return $this;
    }

    public function getDatiVitali(): ?DatiVitali
    {
        return $this->datiVitali;
    }

    public function setDatiVitali(DatiVitali $datiVitali): static
    {
        // set the owning side of the relation if necessary
        if ($datiVitali->getAnagrafica() !== $this) {
            $datiVitali->setAnagrafica($this);
        }

        $this->datiVitali = $datiVitali;

        return $this;
    }

    /**
     * @return Collection<int, Indirizzo>
     */
    public function getIndirizzi(): Collection
    {
        return $this->indirizzi;
    }

    public function addIndirizzi(Indirizzo $indirizzi): static
    {
        if (!$this->indirizzi->contains($indirizzi)) {
            $this->indirizzi->add($indirizzi);
            $indirizzi->setAnagrafica($this);
        }

        return $this;
    }

    public function removeIndirizzi(Indirizzo $indirizzi): static
    {
        if ($this->indirizzi->removeElement($indirizzi)) {
            // set the owning side to null (unless already changed)
            if ($indirizzi->getAnagrafica() === $this) {
                $indirizzi->setAnagrafica(null);
            }
        }

        return $this;
    }
}
