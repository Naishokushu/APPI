<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RatingRepository")
 * 
 * @Serializer\ExclusionPolicy("ALL")
 */
class Rating
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="ratings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userRated;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="rating")
     */
    private $ratedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RatingType", inversedBy="ratings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ratingType;

    public function __construct()
    {
        $this->ratedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserRated(): ?User
    {
        return $this->userRated;
    }

    public function setUserRated(?User $userRated): self
    {
        $this->userRated = $userRated;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getRatedBy(): Collection
    {
        return $this->ratedBy;
    }

    public function addRatedBy(User $ratedBy): self
    {
        if (!$this->ratedBy->contains($ratedBy)) {
            $this->ratedBy[] = $ratedBy;
            $ratedBy->setRating($this);
        }

        return $this;
    }

    public function removeRatedBy(User $ratedBy): self
    {
        if ($this->ratedBy->contains($ratedBy)) {
            $this->ratedBy->removeElement($ratedBy);
            // set the owning side to null (unless already changed)
            if ($ratedBy->getRating() === $this) {
                $ratedBy->setRating(null);
            }
        }

        return $this;
    }

    public function getRatingType(): ?RatingType
    {
        return $this->ratingType;
    }

    public function setRatingType(?RatingType $ratingType): self
    {
        $this->ratingType = $ratingType;

        return $this;
    }
}
