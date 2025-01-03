<?php

namespace App\Entity;

use App\Repository\DocumentoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentoRepository::class)]
#[ORM\Table(name: 'documento_documento')]
class Documento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $oggetto = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $dataFittizia = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'documentiCollegati')]
    private ?self $DocumentoDiRiferimento = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'DocumentoDiRiferimento')]
    private Collection $documentiCollegati;

    #[ORM\ManyToOne(inversedBy: 'documenti')]
    private ?TipologiaContenuto $tipologiaContenuto = null;

    #[ORM\ManyToOne(inversedBy: 'documenti')]
    private ?TipologiaDocumento $tipologiaDocumento = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $note = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $protocollo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descrizione = null;

    /**
     * @var Collection<int, DocumentoNoteMatita>
     */
    #[ORM\OneToMany(targetEntity: DocumentoNoteMatita::class, mappedBy: 'documento')]
    private Collection $NoteAMatita;

    /**
     * @var Collection<int, DocumentoAnagrafica>
     */
    #[ORM\OneToMany(targetEntity: DocumentoAnagrafica::class, mappedBy: 'documento')]
    private Collection $anagrafiche;


    public function __construct()
    {
        $this->documentiCollegati = new ArrayCollection();
        $this->NoteAMatita = new ArrayCollection();
        $this->destinatari = new ArrayCollection();
        $this->mittenti = new ArrayCollection();
        $this->anagrafiche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOggetto(): ?string
    {
        return $this->oggetto;
    }

    public function setOggetto(string $oggetto): static
    {
        $this->oggetto = $oggetto;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(?\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getDataFittizia(): ?int
    {
        return $this->dataFittizia;
    }

    public function setDataFittizia(int $dataFittizia): static
    {
        $this->dataFittizia = $dataFittizia;

        return $this;
    }

    public function getDocumentoDiRiferimento(): ?self
    {
        return $this->DocumentoDiRiferimento;
    }

    public function setDocumentoDiRiferimento(?self $DocumentoDiRiferimento): static
    {
        $this->DocumentoDiRiferimento = $DocumentoDiRiferimento;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getDocumentiCollegati(): Collection
    {
        return $this->documentiCollegati;
    }

    public function addDocumentiCollegati(self $documentiCollegati): static
    {
        if (!$this->documentiCollegati->contains($documentiCollegati)) {
            $this->documentiCollegati->add($documentiCollegati);
            $documentiCollegati->setDocumentoDiRiferimento($this);
        }

        return $this;
    }

    public function removeDocumentiCollegati(self $documentiCollegati): static
    {
        if ($this->documentiCollegati->removeElement($documentiCollegati)) {
            // set the owning side to null (unless already changed)
            if ($documentiCollegati->getDocumentoDiRiferimento() === $this) {
                $documentiCollegati->setDocumentoDiRiferimento(null);
            }
        }

        return $this;
    }

    public function getTipologiaContenuto(): ?TipologiaContenuto
    {
        return $this->tipologiaContenuto;
    }

    public function setTipologiaContenuto(?TipologiaContenuto $tipologiaContenuto): static
    {
        $this->tipologiaContenuto = $tipologiaContenuto;

        return $this;
    }

    public function getTipologiaDocumento(): ?TipologiaDocumento
    {
        return $this->tipologiaDocumento;
    }

    public function setTipologiaDocumento(?TipologiaDocumento $tipologiaDocumento): static
    {
        $this->tipologiaDocumento = $tipologiaDocumento;

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

    public function getProtocollo(): ?string
    {
        return $this->protocollo;
    }

    public function setProtocollo(?string $protocollo): static
    {
        $this->protocollo = $protocollo;

        return $this;
    }

    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    public function setDescrizione(?string $descrizione): static
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * @return Collection<int, DocumentoNoteMatita>
     */
    public function getNoteAMatita(): Collection
    {
        return $this->NoteAMatita;
    }

    public function addNoteAMatita(DocumentoNoteMatita $noteAMatita): static
    {
        if (!$this->NoteAMatita->contains($noteAMatita)) {
            $this->NoteAMatita->add($noteAMatita);
            $noteAMatita->setDocumento($this);
        }

        return $this;
    }

    public function removeNoteAMatita(DocumentoNoteMatita $noteAMatita): static
    {
        if ($this->NoteAMatita->removeElement($noteAMatita)) {
            // set the owning side to null (unless already changed)
            if ($noteAMatita->getDocumento() === $this) {
                $noteAMatita->setDocumento(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DocumentoAnagrafica>
     */
    public function getAnagrafiche(): Collection
    {
        return $this->anagrafiche;
    }

    public function addAnagrafiche(DocumentoAnagrafica $anagrafiche): static
    {
        if (!$this->anagrafiche->contains($anagrafiche)) {
            $this->anagrafiche->add($anagrafiche);
            $anagrafiche->setDocumento($this);
        }

        return $this;
    }

    public function removeAnagrafiche(DocumentoAnagrafica $anagrafiche): static
    {
        if ($this->anagrafiche->removeElement($anagrafiche)) {
            // set the owning side to null (unless already changed)
            if ($anagrafiche->getDocumento() === $this) {
                $anagrafiche->setDocumento(null);
            }
        }

        return $this;
    }

}
