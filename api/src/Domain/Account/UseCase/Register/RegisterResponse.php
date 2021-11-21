<?php

namespace Pricing\Domain\Account\UseCase\Register;

use Pricing\Shared\Error\NotificationError;
use Pricing\Shared\ResponseInterface;

final class RegisterResponse implements ResponseInterface
{
    private NotificationError $notification;

    public function __construct()
    {
        $this->notification = new NotificationError();
    }

    public function addError(string $fieldName, string $message): void
    {
        $this->notification->addError($fieldName, $message);
    }

    public function getNotification(): NotificationError
    {
        return $this->notification;
    }
}
