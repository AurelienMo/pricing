<?php

namespace Pricing\Domain\Account\UseCase\MeUserAccount;

use Pricing\Domain\Account\Model\AccountModel;

class MeUserAccountResponse
{
    private AccountModel $model;

    public function __construct(AccountModel $model)
    {
        $this->model = $model;
    }

    final public function getModel(): AccountModel
    {
        return $this->model;
    }
}
