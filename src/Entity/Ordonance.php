<?php

namespace App\Entity;

use App\Repository\OrdonanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdonanceRepository::class)
 */
class Ordonance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Traitement;

    /**
     * @ORM\ManyToOne(targetEntity=Consultation::class, inversedBy="ordonances")
     */
    private $refToConsultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
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

    public function getTraitement(): ?string
    {
        return $this->Traitement;
    }

    public function setTraitement(string $Traitement): self
    {
        $this->Traitement = $Traitement;

        return $this;
    }

    public function getRefToConsultation(): ?Consultation
    {
        return $this->refToConsultation;
    }

    public function setRefToConsultation(?Consultation $refToConsultation): self
    {
        $this->refToConsultation = $refToConsultation;

        return $this;
    }
}
