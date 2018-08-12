<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Category
 * @package App\Entity
 * @ORM\Entity()
 * @UniqueEntity(fields={"name"})
 */
class Category
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
     * @ORM\Column(type="string",unique=true,length=255)
     * @Assert\NotNull()
     */
    private $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Job", mappedBy="category")
     */
    private $jobs;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getJobs(): Collection
    {
        return $this->jobs;
    }
}