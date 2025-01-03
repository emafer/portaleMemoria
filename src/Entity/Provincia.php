<?php

namespace App\Entity;

use App\Repository\ProvinciaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvinciaRepository::class)]
class Provincia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $regione = null;

    #[ORM\Column(length: 2)]
    private ?string $sigla = null;

    /**
     * @var Collection<int, Comune>
     */
    #[ORM\OneToMany(targetEntity: Comune::class, mappedBy: 'provinciaId')]
    private Collection $comuni;

    public function __construct()
    {
        $this->comuni = new ArrayCollection();
    }

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

    public function getRegione(): ?string
    {
        return $this->regione;
    }

    public function setRegione(string $regione): static
    {
        $this->regione = $regione;

        return $this;
    }

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): static
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * @return Collection<int, Comune>
     */
    public function getComuni(): Collection
    {
        return $this->comuni;
    }

    public function addComuni(Comune $comuni): static
    {
        if (!$this->comuni->contains($comuni)) {
            $this->comuni->add($comuni);
            $comuni->setProvinciaId($this);
        }

        return $this;
    }

    public function removeComuni(Comune $comuni): static
    {
        if ($this->comuni->removeElement($comuni)) {
            // set the owning side to null (unless already changed)
            if ($comuni->getProvinciaId() === $this) {
                $comuni->setProvinciaId(null);
            }
        }

        return $this;
    }
}
