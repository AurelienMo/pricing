<?php

namespace Pricing\Domain\Tarifications\Model;

interface TarificationRepositoryInterface
{
    /**
     * @return array
     */
    public function list(): array;
}
