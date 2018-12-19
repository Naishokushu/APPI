<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * 
 * @Serializer\ExclusionPolicy("ALL")
 */
class User
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleToken;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="user", orphanRemoval=true)
     */
    private $picture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sex", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sex;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rating", mappedBy="userRated", orphanRemoval=true)
     */
    private $ratings;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rating", inversedBy="ratedBy")
     */
    private $rating;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Advert", mappedBy="owner", orphanRemoval=true)
     */
    private $adverts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participation", mappedBy="user")
     */
    private $participations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="user", orphanRemoval=true)
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LikeSubActivity", mappedBy="user", orphanRemoval=true)
     */
    private $likeSubActivities;

    public function __construct()
    {
        $this->picture = new ArrayCollection();
        $this->ratings = new ArrayCollection();
        $this->adverts = new ArrayCollection();
        $this->participations = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->likeSubActivities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFacebookToken(): ?string
    {
        return $this->facebookToken;
    }

    public function setFacebookToken(?string $facebookToken): self
    {
        $this->facebookToken = $facebookToken;

        return $this;
    }

    public function getGoogleToken(): ?string
    {
        return $this->googleToken;
    }

    public function setGoogleToken(?string $googleToken): self
    {
        $this->googleToken = $googleToken;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPicture(): Collection
    {
        return $this->picture;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->picture->contains($picture)) {
            $this->picture[] = $picture;
            $picture->setUer($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->picture->contains($picture)) {
            $this->picture->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getUer() === $this) {
                $picture->setUer(null);
            }
        }

        return $this;
    }

    public function getSex(): ?Sex
    {
        return $this->sex;
    }

    public function setSex(?Sex $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Rating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setUserrated($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->contains($rating)) {
            $this->ratings->removeElement($rating);
            // set the owning side to null (unless already changed)
            if ($rating->getUserrated() === $this) {
                $rating->setUserrated(null);
            }
        }

        return $this;
    }

    public function getRating(): ?Rating
    {
        return $this->rating;
    }

    public function setRating(?Rating $rating): self
    {
        $this->rating = $rating;

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
            $advert->setOwner($this);
        }

        return $this;
    }

    public function removeAdvert(Advert $advert): self
    {
        if ($this->adverts->contains($advert)) {
            $this->adverts->removeElement($advert);
            // set the owning side to null (unless already changed)
            if ($advert->getOwner() === $this) {
                $advert->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Participation[]
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->participations->contains($participation)) {
            $this->participations[] = $participation;
            $participation->addUer($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->participations->contains($participation)) {
            $this->participations->removeElement($participation);
            $participation->removeUer($this);
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setUer($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getUer() === $this) {
                $message->setUer(null);
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
            $likeSubActivity->setUer($this);
        }

        return $this;
    }

    public function removeLikeSubActivity(LikeSubActivity $likeSubActivity): self
    {
        if ($this->likeSubActivities->contains($likeSubActivity)) {
            $this->likeSubActivities->removeElement($likeSubActivity);
            // set the owning side to null (unless already changed)
            if ($likeSubActivity->getUer() === $this) {
                $likeSubActivity->setUer(null);
            }
        }

        return $this;
    }
}
