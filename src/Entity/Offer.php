<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
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
    private $publication_date;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $profile;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $location;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vacantPosition;

    /**
     * @ORM\Column(type="text")
     */
    private $experience;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $dateStart;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $contractType;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $weeklyWorkTime;

    /**
     * @ORM\Column(type="text")
     */
    private $remuneration;

    /**
     * @ORM\Column(type="text")
     */
    private $further_information;

    /**
     * @ORM\ManyToMany(targetEntity=Candidate::class, mappedBy="candidacy")
     */
    private $candidates;

    public function __construct()
    {
        $this->candidates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;

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

    public function getVacantPosition(): ?int
    {
        return $this->vacantPosition;
    }

    public function setVacantPosition(?int $vacantPosition): self
    {
        $this->vacantPosition = $vacantPosition;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->experience;
    }

    public function setExperience(string $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDateStart(): ?string
    {
        return $this->dateStart;
    }

    public function setDateStart(string $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getContractType(): ?string
    {
        return $this->contractType;
    }

    public function setContractType(string $contractType): self
    {
        $this->contractType = $contractType;

        return $this;
    }

    public function getWeeklyWorkTime(): ?string
    {
        return $this->weeklyWorkTime;
    }

    public function setWeeklyWorkTime(string $weeklyWorkTime): self
    {
        $this->weeklyWorkTime = $weeklyWorkTime;

        return $this;
    }

    public function getRemuneration(): ?string
    {
        return $this->remuneration;
    }

    public function setRemuneration(string $remuneration): self
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    public function getFurtherInformation(): ?string
    {
        return $this->further_information;
    }

    public function setFurtherInformation(string $further_information): self
    {
        $this->further_information = $further_information;

        return $this;
    }

    /**
     * @return Collection|Candidate[]
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): self
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates[] = $candidate;
            $candidate->addCandidacy($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): self
    {
        if ($this->candidates->removeElement($candidate)) {
            $candidate->removeCandidacy($this);
        }

        return $this;
    }
}
