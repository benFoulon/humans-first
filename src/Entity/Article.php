<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $publicationDate;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $excerpt;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $udpdatedDate;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="articles")
     */
    private $newComment;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

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

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getUdpdatedDate(): ?\DateTimeInterface
    {
        return $this->udpdatedDate;
    }

    public function setUdpdatedDate(?\DateTimeInterface $udpdatedDate): self
    {
        $this->udpdatedDate = $udpdatedDate;

        return $this;
    }

    public function getNewComment(): ?Comment
    {
        return $this->newComment;
    }

    public function setNewComment(?Comment $newComment): self
    {
        $this->newComment = $newComment;

        return $this;
    }
}
