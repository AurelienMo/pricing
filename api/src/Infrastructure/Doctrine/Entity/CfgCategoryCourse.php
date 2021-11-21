<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class CfgCategoryCourse
{
    private string $id;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private string $name;

    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public static function createFromCli(string $name): CfgCategoryCourse
    {
        $self = new self();
        $self->id = Uuid::v4()->__toString();
        $self->createdAt = new \DateTime();
        $self->updatedAt = new \DateTime();
        $self->name = $name;

        return $self;
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCourses(): Collection
    {
        return $this->courses;
    }
}
