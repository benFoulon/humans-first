<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidateRepository::class)
 */
class Candidate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=110)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=110)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $town;

    /**
     * @ORM\Column(type="blob")
     */
    private $cv;

    /**
     * @ORM\ManyToMany(targetEntity=Offer::class, inversedBy="candidates")
     */
    private $candidacy;

    public function __construct()
    {
        $this->candidacy = new ArrayCollection();
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getCandidacy(): Collection
    {
        return $this->candidacy;
    }

    public function addCandidacy(Offer $candidacy): self
    {
        if (!$this->candidacy->contains($candidacy)) {
            $this->candidacy[] = $candidacy;
        }

        return $this;
    }

    public function removeCandidacy(Offer $candidacy): self
    {
        $this->candidacy->removeElement($candidacy);

        return $this;
    }
}
