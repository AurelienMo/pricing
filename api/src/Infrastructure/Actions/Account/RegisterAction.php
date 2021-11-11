<?php

namespace Pricing\Infrastructure\Actions\Account;

use Pricing\Domain\Account\UseCase\Register\Register;
use Pricing\Domain\Account\UseCase\Register\RegisterDTO;
use Pricing\Domain\Account\UseCase\Register\RegisterPresenterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class RegisterAction
{
    public function __construct(private SerializerInterface $serializer){}

    #[Route("/users", name: "create_user", methods: ["POST"])]
    public function __invoke(Request $request, Register $registerUseCase, RegisterPresenterInterface $registerPresenter): Response
    {
        $req = $this->serializer->deserialize($request->getContent(), RegisterDTO::class, 'json');
        $registerUseCase->execute($req, $registerPresenter);

        return new Response($registerPresenter->getData(), $registerPresenter->getStatusCode());
    }
}
