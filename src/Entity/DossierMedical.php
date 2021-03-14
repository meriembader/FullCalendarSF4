<?php

namespace App\Entity;

use App\Repository\DossierMedicalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierMedicalRepository::class)
 */
class DossierMedical
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
    private $dateCreation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateModification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $remarque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fufuf;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="dossierMedicals")
     */
    private $refDoPatient;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="dossierMedicals")
     */
    private $refDoMed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getFufuf(): ?string
    {
        return $this->fufuf;
    }

    public function setFufuf(string $fufuf): self
    {
        $this->fufuf = $fufuf;

        return $this;
    }

    public function getRefDoPatient(): ?Patient
    {
        return $this->refDoPatient;
    }

    public function setRefDoPatient(?Patient $refDoPatient): self
    {
        $this->refDoPatient = $refDoPatient;

        return $this;
    }

    public function getRefDoMed(): ?Doctor
    {
        return $this->refDoMed;
    }

    public function setRefDoMed(?Doctor $refDoMed): self
    {
        $this->refDoMed = $refDoMed;

        return $this;
    }
}
