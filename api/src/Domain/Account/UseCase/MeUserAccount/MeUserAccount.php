<?php

namespace Pricing\Domain\Account\UseCase\MeUserAccount;

use Pricing\Domain\Account\Model\AccountRepositoryInterface;

class MeUserAccount
{
    public function __construct(private AccountRepositoryInterface $repository){}

    final public function execute(MeUserAccountPresenterInterface $presenter): void
    {
        $model = $this->repository->getUserInformationConnected();
        $response = new MeUserAccountResponse($model);
        $presenter->present($response);
    }
}
