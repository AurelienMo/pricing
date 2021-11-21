<?php

namespace Pricing\Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pricing\Domain\Account\Model\AccountModel;
use Pricing\Domain\Account\Model\AccountRepositoryInterface;
use Pricing\Infrastructure\Doctrine\Entity\Account;
use Symfony\Component\Security\Core\Security;

class AccountRepository extends ServiceEntityRepository implements AccountRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private Security $security)
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

    final public function getUserInformationConnected(): AccountModel
    {
        /** @var Account $account */
        $account = $this->security->getUser();

        return AccountModel::createUserData(
            $account->getId(),
            $account->getEmail(),
            $account->getFirstname(),
            $account->getLastname()
        );
    }
}
