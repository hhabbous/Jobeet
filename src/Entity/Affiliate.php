<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Affiliate
 * @package App\Entity
 * @ORM\Entity()
 * @UniqueEntity(fields={"email"})
 * @ORM\HasLifecycleCallbacks()
 */
class Affiliate
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
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Category")
     */
    private $categories;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Affiliate constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

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
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->categories->add($category);
    }

    /**
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * @return bool
     */
    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
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
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime("now"));
    }
}