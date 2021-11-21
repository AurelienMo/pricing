<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Symfony\Component\Uid\Uuid;

class CfgProject
{
    private string $id;

    private int $number;

    private string $name;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private CfgCourse $cfgCourse;

    private CfgTarification $cfgTarification;

    public static function createFromCli(
        CfgCourse $cfgCourse,
        CfgTarification $cfgTarification,
        string $name,
        int $number
    ): CfgProject {
        $self = new self();
        $self->id = Uuid::v4()->__toString();
        $self->createdAt = new \DateTime();
        $self->updatedAt = new \DateTime();
        $self->cfgCourse = $cfgCourse;
        $self->cfgTarification = $cfgTarification;
        $self->name = $name;
        $self->number = $number;

        return $self;
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final public function getNumber(): int
    {
        return $this->number;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    final public function getCfgCourse(): CfgCourse
    {
        return $this->cfgCourse;
    }

    final public function getCfgTarification(): CfgTarification
    {
        return $this->cfgTarification;
    }
}
