<?php

namespace Pricing\Domain\Account\Model;

use Pricing\Domain\Account\UseCase\Register\RegisterDTO;

final class AccountModel
{
    private string $email;

    private string $firstname;

    private string $lastname;

    private string|null $password;

    public static function createFromDTO(RegisterDTO $registerDTO, string $passwordHash): AccountModel
    {
        $self = new self();
        $self->email = $registerDTO->email;
        $self->firstname = $registerDTO->firstname;
        $self->lastname = $registerDTO->lastname;
        $self->password = $passwordHash;

        return $self;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }
}
