<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandModel;
use Aptitus\Fairs\Domain\Model\Fairs\StandModelRepository;

/**
 * Class DoctrineStandModelRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandModelRepository extends DoctrineRepository implements StandModelRepository
{

    /**
     * {@inheritdoc}
     */
    public function findById($standModelId)
    {
        return $this->repository->find($standModelId);
    }
}
