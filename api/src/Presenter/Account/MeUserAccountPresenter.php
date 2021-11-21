<?php

namespace Pricing\Presenter\Account;

use Pricing\Domain\Account\UseCase\MeUserAccount\MeUserAccountPresenterInterface;
use Pricing\Domain\Account\UseCase\MeUserAccount\MeUserAccountResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class MeUserAccountPresenter implements MeUserAccountPresenterInterface
{
    private int $statusCode;

    private string $data;

    public function __construct(private SerializerInterface $serializer){}

    final public function present(MeUserAccountResponse $response): void
    {
        $this->statusCode = Response::HTTP_OK;
        $this->data = $this->serializer->serialize($response->getModel(), 'json');
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
