<?php

namespace App\Entity;

use App\Repository\SpontaneousCandidacyRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=SpontaneousCandidacyRepository::class)
 * @Vich\Uploadable
 * @UniqueEntity(
 *      fields ={"mail"}
 * )
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
     * @ORM\Column(type="string", length=190)
     */
    private $highestQualification;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $activityDomain;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cv;

        /**
     * @Vich\UploadableField(mapping="spontaneous_candidacy", fileNameProperty="cv")
     * @var File
     */
    private $cvFile;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getfirstname(): ?string
    {
        return $this->firstname;
    }

    public function setfirstname(string $firstname): self
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

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function setCvFile(File $cv = null)
    {
        $this->cvFile = $cv;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($cv) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getCvFile()
    {
        return $this->cvFile;
    }

}
