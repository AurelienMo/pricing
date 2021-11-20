<?php

namespace Pricing\Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pricing\Domain\Account\Model\AccountModel;
use Pricing\Domain\Account\Model\AccountRepositoryInterface;
use Pricing\Infrastructure\Doctrine\Entity\Account;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

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
        $account = $this->findOneBy(['id' => $this->security->getUser()->getId()]);

        if (!$account instanceof Account) {
            throw new NotFoundHttpException('User not found');
        }

        return AccountModel::createUserData(
            $account->getId(),
            $account->getEmail(),
            $account->getFirstname(),
            $account->getLastname()
        );
    }
}
