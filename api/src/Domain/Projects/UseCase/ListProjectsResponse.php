<?php

namespace Pricing\Domain\Projects\UseCase;

class ListProjectsResponse
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
