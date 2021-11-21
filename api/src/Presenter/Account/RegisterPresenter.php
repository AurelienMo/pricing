<?php

namespace Pricing\Presenter\Account;

use Pricing\Domain\Account\UseCase\Register\RegisterPresenterInterface;
use Pricing\Domain\Account\UseCase\Register\RegisterResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class RegisterPresenter implements RegisterPresenterInterface
{
    private int $statusCode;

    private string|null $data;

    public function __construct(private SerializerInterface $serializer){}

    final public function present(RegisterResponse $response): void
    {
        if ($response->getNotification()->hasError()) {
            $this->statusCode = Response::HTTP_BAD_REQUEST;
        } elseif ($response->getNotification()->hasErrorServer()) {
            $this->statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        } else {
            $this->statusCode = Response::HTTP_CREATED;
        }

        $this->data = $response->getNotification()->hasError() ?
            $this->serializer->serialize($response->getNotification()->getErrors(), 'json') : null;
    }

    final public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    final public function getData(): string|null
    {
        return $this->data;
    }
}
