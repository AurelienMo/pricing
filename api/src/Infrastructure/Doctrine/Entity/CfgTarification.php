<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Symfony\Component\Uid\Uuid;

class CfgTarification
{
    private string $id;

    private string $name;

    private string $code;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    final public static function createFromCli(string $name, string $code): CfgTarification
    {
        $self = new self();
        $self->id = Uuid::v4()->__toString();
        $self->name = $name;
        $self->code = $code;
        $self->createdAt = new \DateTime();
        $self->updatedAt = new \DateTime();

        return $self;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCode(): string
    {
        return $this->code;
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
}
