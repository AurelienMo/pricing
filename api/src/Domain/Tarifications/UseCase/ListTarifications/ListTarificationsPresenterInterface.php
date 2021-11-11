<?php

namespace Pricing\Domain\Tarifications\UseCase\ListTarifications;

interface ListTarificationsPresenterInterface
{
    public function present(ListTarificationResponse $response): void;

    public function getStatusCode(): int;

    public function getData(): string;
}
