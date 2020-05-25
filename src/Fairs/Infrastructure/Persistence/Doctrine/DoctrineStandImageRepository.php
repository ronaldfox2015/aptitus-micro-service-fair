<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Stand;
use Aptitus\Fairs\Domain\Model\Fairs\StandImage;
use Aptitus\Fairs\Domain\Model\Fairs\StandImageRepository;

/**
 * Class DoctrineStandImageRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandImageRepository extends DoctrineRepository implements StandImageRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(StandImage $standImage)
    {
        $this->em->persist($standImage);
        $this->em->flush($standImage);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findStandImagesByStand(Stand $stand)
    {
        return $this->repository->findBy(['stand' => $stand->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(StandImage $standImage)
    {
        $this->em->remove($standImage);
        $this->em->flush($standImage);
    }

    /**
     * {@inheritdoc}
     */
    public function getImageByStandId($standId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('si.name, si.type')
            ->from('Fairs:Fairs\StandImage', 'si')
            ->where('si.stand = :standId')
            ->setParameter('standId', $standId);

        return $query->getQuery()->getResult();
    }
}
