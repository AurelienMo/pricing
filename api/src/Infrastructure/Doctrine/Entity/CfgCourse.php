<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Symfony\Component\Uid\Uuid;

class CfgCourse
{
    private string $id;

    private string $name;

    private CfgCategoryCourse $categoryCourse;

    private string $image;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    public static function createFromCli(
        CfgCategoryCourse $categoryCourse,
        string $name,
        string $image
    ): CfgCourse {
        $self = new self();
        $self->id = Uuid::v4()->__toString();
        $self->createdAt = new \DateTime();
        $self->updatedAt = new \DateTime();
        $self->categoryCourse = $categoryCourse;
        $self->name = $name;
        $self->image = $image;

        return $self;
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCategoryCourse(): CfgCategoryCourse
    {
        return $this->categoryCourse;
    }

    final public function getImage(): string
    {
        return $this->image;
    }

    final public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}
