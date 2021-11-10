<?php

namespace Pricing\Infrastructure\Doctrine\Entity;

use Pricing\Domain\Account\Model\AccountModel;
use Symfony\Component\Uid\Uuid;

class Account
{
    private string $id;

    private string $firstname;

    private string $lastname;

    private string $email;

    private string $password;

    private \DateTime $createdAt;

    private \DateTime $updatedAt;

    public function __construct(string $firstname, string $lastname, string $email, string $password)
    {
        $this->id = Uuid::v4()->__toString();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public static function createFromRequest(AccountModel $accountModel): Account
    {
        return new self(
            $accountModel->getFirstname(),
            $accountModel->getLastname(),
            $accountModel->getEmail(),
            $accountModel->getPassword()
        );
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final function getFirstname(): string
    {
        return $this->firstname;
    }

    final public function getLastname(): string
    {
        return $this->lastname;
    }

    final public function getEmail(): string
    {
        return $this->email;
    }

    final public function getPassword(): string
    {
        return $this->password;
    }

    final public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    final public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}
