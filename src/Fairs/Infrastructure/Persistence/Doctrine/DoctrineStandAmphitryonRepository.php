<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandAmphitryonRepository;

/**
 * Class DoctrineStandAmphitryonRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandAmphitryonRepository extends DoctrineRepository implements StandAmphitryonRepository
{

    /**
     * {@inheritdoc}
     */
    public function findById($standAmphitryonId)
    {
        return $this->repository->find($standAmphitryonId);
    }
}
