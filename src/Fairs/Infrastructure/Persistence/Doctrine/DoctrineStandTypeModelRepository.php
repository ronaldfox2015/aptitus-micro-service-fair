<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeModelRepository;

/**
 * Class DoctrineStandTypeRuleRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandTypeModelRepository extends DoctrineRepository implements StandTypeModelRepository
{

    /**
     * {@inheritdoc}
     */
    public function findByStandTypeId($standTypeId)
    {
        return $this->repository->createQueryBuilder('stm')
            ->select('sm.id, sm.name')
            ->join('stm.standType', 'st')
            ->join('stm.standModel', 'sm')
            ->where('st.id = :stId')
            ->setParameter('stId', $standTypeId)
            ->getQuery()
            ->getArrayResult();
    }
}
