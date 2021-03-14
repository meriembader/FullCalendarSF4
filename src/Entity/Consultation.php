<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;



    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consultations")
     */
    private $refToPatient;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="consultations")
     */
    private $refToDoc;

    /**
     * @ORM\OneToMany(targetEntity=Ordonance::class, mappedBy="refToConsultation")
     */
    private $ordonances;

    public function __construct()
    {
        $this->ordonances = new ArrayCollection();
    }

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }



    public function getRefToPatient(): ?Patient
    {
        return $this->refToPatient;
    }

    public function setRefToPatient(?Patient $refToPatient): self
    {
        $this->refToPatient = $refToPatient;

        return $this;
    }

    public function getRefToDoc(): ?Doctor
    {
        return $this->refToDoc;
    }

    public function setRefToDoc(?Doctor $refToDoc): self
    {
        $this->refToDoc = $refToDoc;

        return $this;
    }

    /**
     * @return Collection|Ordonance[]
     */
    public function getOrdonances(): Collection
    {
        return $this->ordonances;
    }

    public function addOrdonance(Ordonance $ordonance): self
    {
        if (!$this->ordonances->contains($ordonance)) {
            $this->ordonances[] = $ordonance;
            $ordonance->setRefToConsultation($this);
        }

        return $this;
    }

    public function removeOrdonance(Ordonance $ordonance): self
    {
        if ($this->ordonances->removeElement($ordonance)) {
            // set the owning side to null (unless already changed)
            if ($ordonance->getRefToConsultation() === $this) {
                $ordonance->setRefToConsultation(null);
            }
        }

        return $this;
    }
}
