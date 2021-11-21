<?php

namespace Pricing\Infrastructure\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseHttpSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onResponse',
        ];
    }

    final public function onResponse(ResponseEvent $event): void
    {
        $response = $event->getResponse();
        $response->headers->add(['Content-Type' => 'application/json']);

        $event->setResponse($response);
    }
}
