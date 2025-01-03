<?php

namespace App\Entity;

use App\Repository\DocumentoAnagraficaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentoAnagraficaRepository::class)]
class DocumentoAnagrafica
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Anagrafica>
     */
    #[ORM\ManyToOne(targetEntity: Anagrafica::class)]
    private Collection $anagrafica;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipologiaRelazioneAnagraficaDocumento $TipoRelazione = null;

    #[ORM\ManyToOne(inversedBy: 'anagrafiche')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Documento $documento = null;

    public function __construct()
    {
        $this->anagrafica = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Anagrafica>
     */
    public function getAnagrafica(): Collection
    {
        return $this->anagrafica;
    }

    public function addAnagrafica(Anagrafica $anagrafica): static
    {
        if (!$this->anagrafica->contains($anagrafica)) {
            $this->anagrafica->add($anagrafica);
        }

        return $this;
    }

    public function removeAnagrafica(Anagrafica $anagrafica): static
    {
        $this->anagrafica->removeElement($anagrafica);

        return $this;
    }

    public function getTipoRelazione(): ?TipologiaRelazioneAnagraficaDocumento
    {
        return $this->TipoRelazione;
    }

    public function setTipoRelazione(?TipologiaRelazioneAnagraficaDocumento $TipoRelazione): static
    {
        $this->TipoRelazione = $TipoRelazione;

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
