<?php

namespace Pricing\Domain\Account\Services;

interface PasswordHasherInterface
{
    public function hash(string $password): string;
}
