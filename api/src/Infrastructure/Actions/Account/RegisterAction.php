<?php

namespace Pricing\Infrastructure\Actions\Account;

use Pricing\Domain\Account\UseCase\Register\Register;
use Pricing\Domain\Account\UseCase\Register\RegisterDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class RegisterAction
{
    public function __construct(private SerializerInterface $serializer){}

    #[Route("/users", name: "create_user", methods: ["POST"])]
    public function __invoke(Request $request, Register $registerUseCase): Response
    {
        $req = $this->serializer->deserialize($request->getContent(), RegisterDTO::class, 'json');
        $response = $registerUseCase->execute($req);

        if (!$response->getNotification()->hasError()) {
            return new JsonResponse(null, Response::HTTP_CREATED, ['Content-Type' => 'application/json']);
        }

        return new Response(
            $this->serializer->serialize($response->getNotification()->getErrors(), 'json'),
            $response->getNotification()->hasErrorServer() ? Response::HTTP_INTERNAL_SERVER_ERROR : Response::HTTP_BAD_REQUEST,
            ['Content-Type' => 'application/json']
        );
    }
}
