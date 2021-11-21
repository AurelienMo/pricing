<?php

namespace Pricing\Domain\Account\UseCase\Register;

interface RegisterPresenterInterface
{
    public function present(RegisterResponse $response): void;

    public function getStatusCode(): int;

    public function getData(): string|null;
}
