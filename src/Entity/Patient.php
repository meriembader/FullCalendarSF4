<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient extends User

{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="refPatient")
     */
    private $rDVs;


    /**
     * @ORM\OneToMany(targetEntity=DossierMedical::class, mappedBy="refDoPatient")
     */
    private $dossierMedicals;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="refToPatient")
     */
    private $consultations;

    /**
     * @ORM\OneToMany(targetEntity=PaimentTransaction::class, mappedBy="refPatient")
     */
    private $paimentTransactions;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="refPatient")
     */
    private $contacts;

    public function __construct()
    {
        $this->rDVs = new ArrayCollection();
        $this->dossierMedicals = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->paimentTransactions = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|RDV[]
     */
    public function getRDVs(): Collection
    {
        return $this->rDVs;
    }

    public function addRDV(RDV $rDV): self
    {
        if (!$this->rDVs->contains($rDV)) {
            $this->rDVs[] = $rDV;
            $rDV->setRefPatient($this);
        }

        return $this;
    }

    public function removeRDV(RDV $rDV): self
    {
        if ($this->rDVs->removeElement($rDV)) {
            // set the owning side to null (unless already changed)
            if ($rDV->getRefPatient() === $this) {
                $rDV->setRefPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setRefToPatient($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getRefToPatient() === $this) {
                $consultation->setRefToPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PaimentTransaction[]
     */
    public function getPaimentTransactions(): Collection
    {
        return $this->paimentTransactions;
    }

    public function addPaimentTransaction(PaimentTransaction $paimentTransaction): self
    {
        if (!$this->paimentTransactions->contains($paimentTransaction)) {
            $this->paimentTransactions[] = $paimentTransaction;
            $paimentTransaction->setRefPatient($this);
        }

        return $this;
    }

    public function removePaimentTransaction(PaimentTransaction $paimentTransaction): self
    {
        if ($this->paimentTransactions->removeElement($paimentTransaction)) {
            // set the owning side to null (unless already changed)
            if ($paimentTransaction->getRefPatient() === $this) {
                $paimentTransaction->setRefPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setRefPatient($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getRefPatient() === $this) {
                $contact->setRefPatient(null);
            }
        }

        return $this;
    }
}
