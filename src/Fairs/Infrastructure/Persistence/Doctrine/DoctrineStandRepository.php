<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Stand;
use Aptitus\Fairs\Domain\Model\Fairs\StandRepository;

/**
 * Class DoctrineStandRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineStandRepository extends DoctrineRepository implements StandRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(Stand $stand)
    {
        $this->em->persist($stand);
        $this->em->flush($stand);
    }

    /**
     * {@inheritdoc}
     */
    public function findStandByCompanyFair(CompanyFair $companyFair)
    {
        return $this->repository->findOneBy(['companyFair' => $companyFair->getId()]);
    }

    /**
     * @param Stand $stand
     * @return mixed
     */
    public function merge(Stand $stand)
    {
        $this->em->merge($stand);
        $this->em->flush($stand);
    }

    /**
     * {@inheritdoc}
     */
    public function getStandByCompanyFair($companyFairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('s.id, st.id as type_id, sm.id as model_id, sa.id as amphitryon')
            ->from('Fairs:Fairs\Stand', 's')
            ->innerJoin('s.standType', 'st')
            ->innerJoin('s.standModel', 'sm')
            ->innerJoin('s.standAmphitryon', 'sa')
            ->where('s.companyFair = :companyFairId')
            ->setParameter('companyFairId', $companyFairId);
        return $query->getQuery()->getOneOrNullResult();
    }
}
