<?php

namespace Pricing\Domain\Projects\UseCase;

interface ListProjectsPresenterInterface
{
    public function present(ListProjectsResponse $response): void;

    public function getStatusCode(): int;

    public function getData(): string;
}
