<?php

namespace Pricing\Domain\Tarifications\UseCase\ListTarifications;

use Pricing\Domain\Tarifications\Model\TarificationModel;
use Pricing\Shared\Error\NotificationError;
use Pricing\Shared\ResponseInterface;

class ListTarificationResponse
{
    private array $models;

    public function __construct(array $models)
    {
        $this->models = $models;
    }

    final public function getModels(): array
    {
        return $this->models;
    }
}
