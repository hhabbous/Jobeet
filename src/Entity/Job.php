<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Job
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Job
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $company;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=255)
     */
    private $logo;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, length=255)
     * @Assert\Url()
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $position;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $howToApply;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $token;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPublic;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActivated;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @Assert\DateTime()
     */
    private $expiresAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getHowToApply(): ?string
    {
        return $this->howToApply;
    }

    /**
     * @param string $howToApply
     */
    public function setHowToApply(string $howToApply): void
    {
        $this->howToApply = $howToApply;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return bool
     */
    public function isPublic(): ?bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     */
    public function setIsPublic(bool $isPublic): void
    {
        $this->isPublic = $isPublic;
    }

    /**
     * @return bool
     */
    public function isActivated(): ?bool
    {
        return $this->isActivated;
    }

    /**
     * @param bool $isActivated
     */
    public function setIsActivated(bool $isActivated): void
    {
        $this->isActivated = $isActivated;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     */
    public function setExpiresAt(\DateTime $expiresAt): void
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime("now"));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime("now"));
    }
}