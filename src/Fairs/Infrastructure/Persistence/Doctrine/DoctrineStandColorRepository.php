<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Stand;
use Aptitus\Fairs\Domain\Model\Fairs\StandColor;
use Aptitus\Fairs\Domain\Model\Fairs\StandColorRepository;

/**
 * Class DoctrineStandColorRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandColorRepository extends DoctrineRepository implements StandColorRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(StandColor $standColor)
    {
        $this->em->persist($standColor);
        $this->em->flush($standColor);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findStandColorsByStand(Stand $stand)
    {
        return $this->repository->findBy(['stand' => $stand->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function merge(StandColor $standColor)
    {
        $this->em->merge($standColor);
        $this->em->flush($standColor);
    }

    /**
     * {@inheritdoc}
     */
    public function getStandColorByStandId($standId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('sc.name')
            ->from('Fairs:Fairs\StandColor', 'sc')
            ->where('sc.stand = :standId')
            ->setParameter('standId', $standId);

        return $query->getQuery()->getResult();
    }
}
