<?php

namespace Pricing\Shared\Error;

use Assert\LazyAssertionException;
use Pricing\Shared\ResponseInterface;

class BuildLazyAssertionException
{
    public static function buildErrors(LazyAssertionException $e, ResponseInterface $response): void
    {
        foreach ($e->getErrorExceptions() as $error) {
            $response->addError($error->getPropertyPath(), $error->getMessage());
        }
    }
}
