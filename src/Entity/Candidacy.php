<?php

namespace App\Entity;

use App\Repository\CandidacyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 * @ORM\Entity(repositoryClass=CandidacyRepository::class)
 * @UniqueEntity(
 *     fields={"candidate", "offer"},
 *     errorPath="candidate",
 *     message="Vous ne pouvez postuler qu'une seule fois à une même annonce"
 * )
 */
class Candidacy
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
     * @ORM\ManyToOne(targetEntity=Candidate::class, inversedBy="candidacies")
     */
    private $candidates;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="candidacies")
     */
    private $offers;

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

    public function getCandidates(): ?Candidate
    {
        return $this->candidates;
    }

    public function setCandidates(?Candidate $candidates): self
    {
        $this->candidates = $candidates;

        return $this;
    }

    public function getOffers(): ?Offer
    {
        return $this->offers;
    }

    public function setOffers(?Offer $offers): self
    {
        $this->offers = $offers;

        return $this;
    }
}
