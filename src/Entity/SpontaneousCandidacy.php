<?php

namespace App\Entity;

use App\Repository\SpontaneousCandidacyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpontaneousCandidacyRepository::class)
 */
class SpontaneousCandidacy
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
    private $fisrtname;

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
     * @ORM\Column(type="string", length=190)
     */
    private $highestQualification;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $activityDomain;

    /**
     * @ORM\Column(type="blob")
     */
    private $cv;

    /**
     * @ORM\Column(type="blob")
     */
    private $motivationLetter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFisrtname(): ?string
    {
        return $this->fisrtname;
    }

    public function setFisrtname(string $fisrtname): self
    {
        $this->fisrtname = $fisrtname;

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

    public function getHighestQualification(): ?string
    {
        return $this->highestQualification;
    }

    public function setHighestQualification(string $highestQualification): self
    {
        $this->highestQualification = $highestQualification;

        return $this;
    }

    public function getActivityDomain(): ?string
    {
        return $this->activityDomain;
    }

    public function setActivityDomain(string $activityDomain): self
    {
        $this->activityDomain = $activityDomain;

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

    public function getMotivationLetter()
    {
        return $this->motivationLetter;
    }

    public function setMotivationLetter($motivationLetter): self
    {
        $this->motivationLetter = $motivationLetter;

        return $this;
    }
}
