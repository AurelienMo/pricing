<?php

namespace Pricing\Shared\Error;

final class NotificationError
{
    private array $errors = [];

    public function addError(string $fieldName, string $message): self
    {
        $this->errors[] = new Error($fieldName, $message);

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasError(): bool
    {
        return count($this->errors) > 0;
    }

    public function hasErrorServer(): bool
    {
        return count(array_filter($this->errors, static function(Error $error) {
            return $error->getFieldName() === 'server';
        })) > 0;
    }
}
