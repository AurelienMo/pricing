<?php

namespace Pricing\Infrastructure\Actions\Account;

use Pricing\Domain\Account\UseCase\MeUserAccount\MeUserAccount;
use Pricing\Domain\Account\UseCase\MeUserAccount\MeUserAccountPresenterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeAction
{
    #[Route('/me', name: 'user_me_account', methods: ['GET'])]
    public function __invoke(Request $request, MeUserAccount $useCase, MeUserAccountPresenterInterface $presenter): Response
    {
        $useCase->execute($presenter);

        return new Response($presenter->getData(), $presenter->getStatusCode());
    }
}
