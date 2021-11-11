<?php

namespace Pricing\Infrastructure\Actions\Tarifications;

use Pricing\Domain\Tarifications\UseCase\ListTarifications\ListTarifications;
use Pricing\Domain\Tarifications\UseCase\ListTarifications\ListTarificationsPresenterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListTarificationsAction
{
    #[Route("/tarifications", name: "list_tarifications", methods: ["GET"])]
    public function __invoke(Request $request, ListTarifications $useCase, ListTarificationsPresenterInterface $presenter): Response
    {
        $useCase->execute($presenter);

        return new Response($presenter->getData(), $presenter->getStatusCode());
    }
}
