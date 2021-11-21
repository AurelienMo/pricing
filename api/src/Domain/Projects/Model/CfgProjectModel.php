<?php

namespace Pricing\Domain\Projects\Model;

final class CfgProjectModel
{
    private string $id;

    private string $name;

    private int $number;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private CfgTarificationModel $tarificationModel;

    final public static function createFromDatabase(
        string $id,
        string $name,
        int $number,
        \DateTime $createdAt,
        \DateTime $updatedAt,
        CfgTarificationModel $tarificationModel,
    ): CfgProjectModel {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->number = $number;
        $self->createdAt = $createdAt;
        $self->updatedAt = $updatedAt;
        $self->tarificationModel = $tarificationModel;

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

    final public function getNumber(): int
    {
        return $this->number;
    }

    final public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    final public function getTarificationModel(): CfgTarificationModel
    {
        return $this->tarificationModel;
    }
}
