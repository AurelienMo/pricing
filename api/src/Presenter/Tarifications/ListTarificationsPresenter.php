<?php

namespace Pricing\Presenter\Tarifications;

use Pricing\Domain\Tarifications\UseCase\ListTarifications\ListTarificationResponse;
use Pricing\Domain\Tarifications\UseCase\ListTarifications\ListTarificationsPresenterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ListTarificationsPresenter implements ListTarificationsPresenterInterface
{
    private int $statusCode;

    private string $data;

    public function __construct(private SerializerInterface $serializer){}

    final public function present(ListTarificationResponse $response): void
    {
        $this->statusCode = Response::HTTP_OK;
        $this->data = $this->serializer->serialize($response->getModels(), 'json');
    }

    final public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    final public function getData(): string
    {
        return $this->data;
    }
}
