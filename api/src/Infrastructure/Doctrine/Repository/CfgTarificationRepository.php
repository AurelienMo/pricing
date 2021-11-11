<?php

namespace Pricing\Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pricing\Domain\Tarifications\Model\TarificationModel;
use Pricing\Domain\Tarifications\Model\TarificationRepositoryInterface;
use Pricing\Infrastructure\Doctrine\Entity\CfgTarification;

class CfgTarificationRepository extends ServiceEntityRepository implements TarificationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CfgTarification::class);
    }

    final public function list(): array
    {
        $cfgTarifications = $this->findAll();

        return array_map(function (CfgTarification $tarification) {
            return new TarificationModel(
                $tarification->getId(),
                $tarification->getCreatedAt(),
                $tarification->getUpdatedAt(),
                $tarification->getName(),
                $tarification->getCode()
            );
        }, $cfgTarifications);
    }
}
