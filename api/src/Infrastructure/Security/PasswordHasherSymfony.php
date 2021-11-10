<?php

namespace Pricing\Infrastructure\Security;

use Pricing\Infrastructure\Doctrine\Entity\Account;
use Symfony\Component\PasswordHasher\Hasher\MigratingPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Pricing\Domain\Account\Services\PasswordHasherInterface;

final class PasswordHasherSymfony implements PasswordHasherInterface
{
    public function __construct(private PasswordHasherFactoryInterface $passwordFactory){}

    public function hash(string $password): string
    {
        return $this->getEncoder()->hash($password);
    }

    private function getEncoder()
    {
        return $this->passwordFactory->getPasswordHasher(Account::class);
    }
}
