<?php

namespace Pricing\Shared;

use Pricing\Shared\Error\NotificationError;

interface ResponseInterface
{
    public function addError(string $property, string $message): void;

    public function getNotification(): NotificationError;
}
