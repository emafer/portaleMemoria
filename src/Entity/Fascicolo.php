<?php

namespace App\Entity;

use App\Repository\FascicoloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FascicoloRepository::class)]
class Fascicolo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $note = null;

    #[ORM\ManyToOne(inversedBy: 'fascicoli')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Faldone $faldone = null;

    /**
     * @var Collection<int, Internato>
     */
    #[ORM\ManyToMany(targetEntity: Internato::class, mappedBy: 'fascicoli')]
    private Collection $internati;

    public function __construct()
    {
        $this->internati = new ArrayCollection();
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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getFaldone(): ?Faldone
    {
        return $this->faldone;
    }

    public function setFaldone(?Faldone $faldone): static
    {
        $this->faldone = $faldone;

        return $this;
    }

    /**
     * @return Collection<int, Internato>
     */
    public function getInternati(): Collection
    {
        return $this->internati;
    }

    public function addInternati(Internato $internati): static
    {
        if (!$this->internati->contains($internati)) {
            $this->internati->add($internati);
            $internati->addFascicoli($this);
        }

        return $this;
    }

    public function removeInternati(Internato $internati): static
    {
        if ($this->internati->removeElement($internati)) {
            $internati->removeFascicoli($this);
        }

        return $this;
    }
}
