<?php

namespace App\Entity;

use App\Repository\RDVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RDVRepository::class)
 */
class RDV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="rDVs")
     */
    private $refDoc;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="rDVs")
     */
    private $refPatient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getConfirmation(): ?bool
    {
        return $this->confirmation;
    }

    public function setConfirmation(bool $confirmation): self
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getRefDoc(): ?Doctor
    {
        return $this->refDoc;
    }

    public function setRefDoc(?Doctor $refDoc): self
    {
        $this->refDoc = $refDoc;

        return $this;
    }

    public function getRefPatient(): ?Patient
    {
        return $this->refPatient;
    }

    public function setRefPatient(?Patient $refPatient): self
    {
        $this->refPatient = $refPatient;

        return $this;
    }
}
