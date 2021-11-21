<?php

namespace Pricing\Domain\Account\UseCase\Register;

use Assert\Assert;
use Assert\LazyAssertionException;
use Pricing\Domain\Account\Model\AccountModel;
use Pricing\Domain\Account\Model\AccountRepositoryInterface;
use Pricing\Domain\Account\Services\PasswordHasherInterface;
use Pricing\Shared\Error\BuildLazyAssertionException;

final class Register
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository,
        private PasswordHasherInterface $passwordHasher
    ){}

    public function execute(RegisterDTO $registerDTO, RegisterPresenterInterface $registerPresenter): void
    {
        $response = new RegisterResponse();
        $isValid = $this->validateDTO($registerDTO, $response) && $this->checkExistAccount($registerDTO, $response);
        if ($isValid) {
            try {
                $this->saveAccount($registerDTO);
            } catch (\Exception $e) {
                $response->addError('server', 'Une erreur inattendue a été rencontré.');
            }
        }

        $registerPresenter->present($response);
    }

    private function validateDTO(RegisterDTO $registerDTO, RegisterResponse $response): bool
    {
        try {
            Assert::lazy()
                ->that($registerDTO->firstname, 'firstname')
                    ->regex("/^[a-zA-Z]{1,}$/", 'Le prénom est requis.')->string('error-string')
                ->that($registerDTO->lastname, 'lastname')
                    ->regex("/^[a-zA-Z]{1,}$/", 'Le nom est requis.')->string('error-string')
                ->that($registerDTO->email, 'email')
                    ->email("L'adresse email est requise.")->string('error-string')
                ->that($registerDTO->password, 'password')
                    ->regex("/^[a-zA-Z0-9]{6,}$/", 'Le mot de passe doit faire au minimum 6 caractères alphanumériques')->string('error-string')
                ->verifyNow();
            return true;
        } catch (LazyAssertionException $e) {
            BuildLazyAssertionException::buildErrors($e, $response);
            return false;
        }
    }

    private function checkExistAccount(RegisterDTO $registerDTO, RegisterResponse $response): bool
    {
        $accountExist = $this->accountRepository->hasAccountWithEmail($registerDTO->email);

        if ($accountExist) {
            $response->addError('email', "Un compte est déjà existant.");

            return false;
        }

        return true;
    }

    private function saveAccount(RegisterDTO $registerDTO): void
    {
        $account = AccountModel::createFromDTO($registerDTO, $this->passwordHasher->hash($registerDTO->password));
        $this->accountRepository->createAccount($account);
    }
}
