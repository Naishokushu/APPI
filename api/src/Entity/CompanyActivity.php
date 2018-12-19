<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyActivityRepository")
 * 
 * @Serializer\ExclusionPolicy("ALL")
 */
class CompanyActivity
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="companyActivities")
     */
    private $company;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity", inversedBy="companyActivities")
     */
    private $activity;

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }
}
