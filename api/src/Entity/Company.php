<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 * 
 * @Serializer\ExclusionPolicy("ALL")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailPro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailPublic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phonePro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phonePublic;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $token;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offer", mappedBy="company", orphanRemoval=true)
     */
    private $offers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pro", mappedBy="company", orphanRemoval=true)
     */
    private $pros;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompanyActivity", mappedBy="company")
     */
    private $companyActivities;

    public function __construct()
    {
        $this->enabled = true;
        $this->offers = new ArrayCollection();
        $this->pros = new ArrayCollection();
        $this->companyActivities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getEmailPro(): ?string
    {
        return $this->emailPro;
    }

    public function setEmailPro(string $emailPro): self
    {
        $this->emailPro = $emailPro;

        return $this;
    }

    public function getEmailPublic(): ?string
    {
        return $this->emailPublic;
    }

    public function setEmailPublic(?string $emailPublic): self
    {
        $this->emailPublic = $emailPublic;

        return $this;
    }

    public function getPhonePro(): ?string
    {
        return $this->phonePro;
    }

    public function setPhonePro(?string $phonePro): self
    {
        $this->phonePro = $phonePro;

        return $this;
    }

    public function getPhonePublic(): ?string
    {
        return $this->phonePublic;
    }

    public function setPhonePublic(?string $phonePublic): self
    {
        $this->phonePublic = $phonePublic;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setCompany($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
            // set the owning side to null (unless already changed)
            if ($offer->getCompany() === $this) {
                $offer->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pro[]
     */
    public function getPros(): Collection
    {
        return $this->pros;
    }

    public function addPro(Pro $pro): self
    {
        if (!$this->pros->contains($pro)) {
            $this->pros[] = $pro;
            $pro->setCompany($this);
        }

        return $this;
    }

    public function removePro(Pro $pro): self
    {
        if ($this->pros->contains($pro)) {
            $this->pros->removeElement($pro);
            // set the owning side to null (unless already changed)
            if ($pro->getCompany() === $this) {
                $pro->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompanyActivity[]
     */
    public function getCompanyActivities(): Collection
    {
        return $this->companyActivities;
    }

    public function addCompanyActivity(CompanyActivity $companyActivity): self
    {
        if (!$this->companyActivities->contains($companyActivity)) {
            $this->companyActivities[] = $companyActivity;
            $companyActivity->addCompany($this);
        }

        return $this;
    }

    public function removeCompanyActivity(CompanyActivity $companyActivity): self
    {
        if ($this->companyActivities->contains($companyActivity)) {
            $this->companyActivities->removeElement($companyActivity);
            $companyActivity->removeCompany($this);
        }

        return $this;
    }
}
