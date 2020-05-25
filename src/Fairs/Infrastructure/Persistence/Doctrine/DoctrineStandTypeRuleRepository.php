<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeRuleRepository;

/**
 * Class DoctrineStandTypeRuleRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandTypeRuleRepository extends DoctrineRepository implements StandTypeRuleRepository
{

    /**
     * {@inheritdoc}
     */
    public function findByStandTypeId($standTypeId)
    {
        return $this->repository->createQueryBuilder('str')
            ->select('str.rule, str.required')
            ->join('str.standType', 'st')
            ->where('st.id = :stId')
            ->setParameter('stId', $standTypeId)
            ->getQuery()
            ->getResult();
    }
}
