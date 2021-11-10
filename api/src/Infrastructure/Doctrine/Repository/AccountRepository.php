<?php

namespace Pricing\Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pricing\Domain\Account\Model\AccountModel;
use Pricing\Domain\Account\Model\AccountRepositoryInterface;
use Pricing\Infrastructure\Doctrine\Entity\Account;

class AccountRepository extends ServiceEntityRepository implements AccountRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Account::class);
    }

    final public function hasAccountWithEmail(string $email): bool
    {
         return $this->findOneBy(['email' => $email]) instanceof Account;
    }

    final public function createAccount(AccountModel $accountModel): void
    {
        $account = Account::createFromRequest($accountModel);
        $this->_em->persist($account);
        $this->_em->flush();
    }
}
