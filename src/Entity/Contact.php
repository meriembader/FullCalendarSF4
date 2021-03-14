<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="contacts")
     */
    private $refPatient;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="contacts")
     */
    private $refDoctor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    /**
     * @ORM\Column(type="float")
     */
    private $duree;

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



    public function getRefPatient(): ?Patient
    {
        return $this->refPatient;
    }

    public function setRefPatient(?Patient $refPatient): self
    {
        $this->refPatient = $refPatient;

        return $this;
    }

    public function getRefDoctor(): ?Doctor
    {
        return $this->refDoctor;
    }

    public function setRefDoctor(?Doctor $refDoctor): self
    {
        $this->refDoctor = $refDoctor;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
