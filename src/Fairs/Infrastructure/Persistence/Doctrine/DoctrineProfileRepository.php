<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Profile;
use Aptitus\Fairs\Domain\Model\Fairs\ProfileRepository;

/**
 * Class DoctrineProfileRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineProfileRepository extends DoctrineRepository implements ProfileRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(Profile $profile)
    {
        $this->em->persist($profile);
        $this->em->flush($profile);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findProfileByCompanyFair($companyFair)
    {
        return $this->repository->findBy(['companyFair' => $companyFair->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Profile $profile)
    {
        $this->em->remove($profile);
        $this->em->flush($profile);
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileByCompanyFair($companyFairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('p.label as title, p.description')
            ->from('Fairs:Fairs\Profile', 'p')
            ->where('p.companyFair = :companyFairId')
            ->setParameter('companyFairId', $companyFairId);

        return $query->getQuery()->getResult();
    }
}
