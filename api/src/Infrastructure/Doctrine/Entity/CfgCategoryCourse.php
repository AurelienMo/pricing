<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Symfony\Component\Uid\Uuid;

class CfgCategoryCourse
{
    private string $id;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private string $name;

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
}
