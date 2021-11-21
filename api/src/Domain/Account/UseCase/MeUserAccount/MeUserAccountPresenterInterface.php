<?php

namespace Pricing\Domain\Account\UseCase\MeUserAccount;

interface MeUserAccountPresenterInterface
{
    public function present(MeUserAccountResponse $response): void;

    public function getStatusCode(): int;

    public function getData(): string;
}
