<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeAmphitryonRepository;

/**
 * Class DoctrineStandTypeRuleRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandTypeAmphitryonRepository extends DoctrineRepository implements StandTypeAmphitryonRepository
{

    /**
     * {@inheritdoc}
     */
    public function findByStandTypeId($standTypeId)
    {
        return $this->repository->createQueryBuilder('sta')
            ->select('sa.id, sa.name')
            ->join('sta.standType', 'st')
            ->join('sta.standAmphitryon', 'sa')
            ->where('st.id = :stId')
            ->setParameter('stId', $standTypeId)
            ->getQuery()
            ->getResult();
    }
}
