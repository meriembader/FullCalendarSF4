<?php

namespace App\Entity;

use App\Repository\PaimentTransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaimentTransactionRepository::class)
 */
class PaimentTransaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ManyToOne;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="paimentTransactions")
     */
    private $refPatient;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="paimentTransactions")
     */
    private $reftoDoc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

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

    public function getManyToOne(): ?string
    {
        return $this->ManyToOne;
    }

    public function setManyToOne(string $ManyToOne): self
    {
        $this->ManyToOne = $ManyToOne;

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

    public function getReftoDoc(): ?Doctor
    {
        return $this->reftoDoc;
    }

    public function setReftoDoc(?Doctor $reftoDoc): self
    {
        $this->reftoDoc = $reftoDoc;

        return $this;
    }
}
