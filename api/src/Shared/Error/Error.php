<?php

namespace Pricing\Shared\Error;

final class Error
{
    private string $fieldname;

    private string $message;

    public function __construct(string $fieldname, string $message)
    {
        $this->fieldname = $fieldname;
        $this->message = $message;
    }

    public function __toString(): string
    {
        return sprintf("%s:%s", $this->fieldname, $this->message);
    }

    public function getFieldName(): string
    {
        return $this->fieldname;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
