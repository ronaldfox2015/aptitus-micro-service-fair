<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Stand;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideo;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideoRepository;

/**
 * Class DoctrineStandVideoRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandVideoRepository extends DoctrineRepository implements StandVideoRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(StandVideo $standVideo)
    {
        $this->em->persist($standVideo);
        $this->em->flush($standVideo);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findStandVideoByStand(Stand $stand)
    {
        return $this->repository->findOneBy(['stand' => $stand->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function merge(StandVideo $standVideo)
    {
        $this->em->merge($standVideo);
        $this->em->flush($standVideo);
    }

    /**
     * {@inheritdoc}
     */
    public function getVideoByStandId($standId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('sv.name')
            ->from('Fairs:Fairs\StandVideo', 'sv')
            ->where('sv.stand = :standId')
            ->setParameter('standId', $standId);

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function remove(StandVideo $standVideo)
    {
        $this->em->remove($standVideo);
        $this->em->flush($standVideo);
    }
}
