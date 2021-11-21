<?php

namespace Pricing\Presenter\Projects;

use Pricing\Domain\Projects\UseCase\ListProjectsPresenterInterface;
use Pricing\Domain\Projects\UseCase\ListProjectsResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class ListProjectsPresenter implements ListProjectsPresenterInterface
{
    private int $statusCode;

    private string $data;

    public function __construct(private SerializerInterface $serializer) {}

    public function present(ListProjectsResponse $response): void
    {
        $this->statusCode = Response::HTTP_OK;
        $this->data = $this->serializer->serialize($response->getModels(), 'json');
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getData(): string
    {
        return $this->data;
    }
}
