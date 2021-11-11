<?php

namespace Pricing\Domain\Tarifications\Model;

final class TarificationModel
{
    private string $id;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    private string $name;

    private string $code;

    public function __construct(string $id, \DateTime $createdAt, \DateTime $updatedAt, string $name, string $code)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->name = $name;
        $this->code = $code;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
