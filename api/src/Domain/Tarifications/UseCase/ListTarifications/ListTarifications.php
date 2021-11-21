<?php

namespace Pricing\Domain\Tarifications\UseCase\ListTarifications;

use Pricing\Domain\Tarifications\Model\TarificationRepositoryInterface;

class ListTarifications
{
    public function __construct(private TarificationRepositoryInterface $repository){}

    final public function execute(ListTarificationsPresenterInterface $presenter): void
    {
        $models = $this->repository->list();
        $response = new ListTarificationResponse($models);
        $presenter->present($response);
    }
}
