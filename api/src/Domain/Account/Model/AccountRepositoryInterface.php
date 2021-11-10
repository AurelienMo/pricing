<?php

namespace Pricing\Domain\Account\Model;

interface AccountRepositoryInterface
{
    public function hasAccountWithEmail(string $email): bool;

    public function createAccount(AccountModel $accountModel): void;
}
