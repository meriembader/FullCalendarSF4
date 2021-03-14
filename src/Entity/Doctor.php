<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DoctorRepository::class)
 */
class Doctor extends User
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
    private $specialite;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=RDV::class, mappedBy="refDoc")
     */
    private $rDVs;

    /**
     * @ORM\OneToMany(targetEntity=DossierMedical::class, mappedBy="refDoMed")
     */
    private $dossierMedicals;

    /**
     * @ORM\OneToMany(targetEntity=Consultation::class, mappedBy="refToDoc")
     */
    private $consultations;

    /**
     * @ORM\OneToMany(targetEntity=Disponibilite::class, mappedBy="reftoMed")
     */
    private $disponibilites;

    /**
     * @ORM\OneToMany(targetEntity=PaimentTransaction::class, mappedBy="reftoDoc")
     */
    private $paimentTransactions;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="refDoctor")
     */
    private $contacts;



    public function __construct()
    {
        $this->rDVs = new ArrayCollection();
        $this->dossierMedicals = new ArrayCollection();
        $this->consultations = new ArrayCollection();
        $this->disponibilites = new ArrayCollection();
        $this->paimentTransactions = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
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
            $rDV->setRefDoc($this);
        }

        return $this;
    }

    public function removeRDV(RDV $rDV): self
    {
        if ($this->rDVs->removeElement($rDV)) {
            // set the owning side to null (unless already changed)
            if ($rDV->getRefDoc() === $this) {
                $rDV->setRefDoc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DossierMedical[]
     */
    public function getDossierMedicals(): Collection
    {
        return $this->dossierMedicals;
    }

    public function addDossierMedical(DossierMedical $dossierMedical): self
    {
        if (!$this->dossierMedicals->contains($dossierMedical)) {
            $this->dossierMedicals[] = $dossierMedical;
            $dossierMedical->setRefDoMed($this);
        }

        return $this;
    }

    public function removeDossierMedical(DossierMedical $dossierMedical): self
    {
        if ($this->dossierMedicals->removeElement($dossierMedical)) {
            // set the owning side to null (unless already changed)
            if ($dossierMedical->getRefDoMed() === $this) {
                $dossierMedical->setRefDoMed(null);
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
            $consultation->setRefToDoc($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getRefToDoc() === $this) {
                $consultation->setRefToDoc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Disponibilite[]
     */
    public function getDisponibilites(): Collection
    {
        return $this->disponibilites;
    }

    public function addDisponibilite(Disponibilite $disponibilite): self
    {
        if (!$this->disponibilites->contains($disponibilite)) {
            $this->disponibilites[] = $disponibilite;
            $disponibilite->setReftoMed($this);
        }

        return $this;
    }

    public function removeDisponibilite(Disponibilite $disponibilite): self
    {
        if ($this->disponibilites->removeElement($disponibilite)) {
            // set the owning side to null (unless already changed)
            if ($disponibilite->getReftoMed() === $this) {
                $disponibilite->setReftoMed(null);
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
            $paimentTransaction->setReftoDoc($this);
        }

        return $this;
    }

    public function removePaimentTransaction(PaimentTransaction $paimentTransaction): self
    {
        if ($this->paimentTransactions->removeElement($paimentTransaction)) {
            // set the owning side to null (unless already changed)
            if ($paimentTransaction->getReftoDoc() === $this) {
                $paimentTransaction->setReftoDoc(null);
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
            $contact->setRefDoctor($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getRefDoctor() === $this) {
                $contact->setRefDoctor(null);
            }
        }

        return $this;
    }
}
