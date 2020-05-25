<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeRepository;

/**
 * Class DoctrineStandTypeRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandTypeRepository extends DoctrineRepository implements StandTypeRepository
{
    /**
     * {@inheritdoc}
     */
    public function findById($standTypeId)
    {
        return $this->repository->find($standTypeId);
    }
}
