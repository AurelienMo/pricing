<?php

namespace Pricing\Domain\Projects\Model;

final class CfgTarificationModel
{
    private string $id;

    private string $name;

    private string $code;

    final public static function createFromDatabase(
        string $id,
        string $name,
        string $code
    ): CfgTarificationModel {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->code = $code;

        return $self;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCode(): string
    {
        return $this->code;
    }
}
