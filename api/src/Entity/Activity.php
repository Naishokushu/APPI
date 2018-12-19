<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 * 
 * @Serializer\ExclusionPolicy("ALL")
 */
class Activity
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
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $selectable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\Column(type="boolean")
     */
    private $majorityRequired;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity", inversedBy="subactivities")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activity", mappedBy="parent")
     */
    private $subactivities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActivityTranslation", mappedBy="activity", orphanRemoval=true)
     */
    private $translations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Advert", mappedBy="activity")
     */
    private $adverts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LikeSubActivity", mappedBy="activity", orphanRemoval=true)
     */
    private $likeSubActivities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompanyActivity", mappedBy="activity")
     */
    private $companyActivities;

    public function __construct()
    {
        $this->subactivities = new ArrayCollection();
        $this->selectable = true;
        $this->majorityRequired = false;
        $this->enabled = true;
        $this->translations = new ArrayCollection();
        $this->adverts = new ArrayCollection();
        $this->likeSubActivities = new ArrayCollection();
        $this->companyActivities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSelectable(): ?bool
    {
        return $this->selectable;
    }

    // DO NOT CHANGE VISIBILITY TO PUBLIC, THIS COULD CAUSE DESYNCHRONIZATION IN THE DATABASE
    private function setSelectable(bool $selectable): self
    {
        $this->selectable = $selectable;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getMajorityRequired(): ?bool
    {
        return $this->majorityRequired;
    }

    public function setMajorityRequired(bool $majorityRequired): self
    {
        $this->majorityRequired = $majorityRequired;

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getSubactivities(): Collection
    {
        return $this->subactivities;
    }

    public function addSubactivity(Activity $subactivity): self
    {
        if (!$this->subactivities->contains($subactivity)) {
            $this->subactivities[] = $subactivity;
            $subactivity->setParent($this);
        }

        $this->setSelectable($this->subactivities->count() === 0);

        return $this;
    }

    public function removeSubactivity(Activity $subactivity): self
    {
        if ($this->subactivities->contains($subactivity)) {
            $this->subactivities->removeElement($subactivity);
            // set the owning side to null (unless already changed)
            if ($subactivity->getParent() === $this) {
                $subactivity->setParent(null);
            }
        }

        $this->setSelectable($this->subactivities->count() === 0);

        return $this;
    }

    /**
     * @return Collection|ActivityTranslation[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(ActivityTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setActivity($this);
        }

        return $this;
    }

    public function removeTranslation(ActivityTranslation $translation): self
    {
        if ($this->translations->contains($translation)) {
            $this->translations->removeElement($translation);
            // set the owning side to null (unless already changed)
            if ($translation->getActivity() === $this) {
                $translation->setActivity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Advert[]
     */
    public function getAdverts(): Collection
    {
        return $this->adverts;
    }

    public function addAdvert(Advert $advert): self
    {
        if (!$this->adverts->contains($advert)) {
            $this->adverts[] = $advert;
            $advert->setActivity($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->contains($advert)) {
            $this->adverts->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getActivity() === $this) {
                $advert->setActivity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LikeSubActivity[]
     */
    public function getLikeSubActivities(): Collection
    {
        return $this->likeSubActivities;
    }

    public function addLikeSubActivity(LikeSubActivity $likeSubActivity): self
    {
        if (!$this->likeSubActivities->contains($likeSubActivity)) {
            $this->likeSubActivities[] = $likeSubActivity;
            $likeSubActivity->setActivity($this);
        }

        return $this;
    }

    public function removeLikeSubActivity(LikeSubActivity $likeSubActivity): self
    {
        if ($this->likeSubActivities->contains($likeSubActivity)) {
            $this->likeSubActivities->removeElement($likeSubActivity);
            // set the owning side to null (unless already changed)
            if ($likeSubActivity->getActivity() === $this) {
                $likeSubActivity->setActivity(null);
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
            $companyActivity->addActivity($this);
        }

        return $this;
    }

    public function removeCompanyActivity(CompanyActivity $companyActivity): self
    {
        if ($this->companyActivities->contains($companyActivity)) {
            $this->companyActivities->removeElement($companyActivity);
            $companyActivity->removeActivity($this);
        }

        return $this;
    }
}
