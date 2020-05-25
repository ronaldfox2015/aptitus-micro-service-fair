<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\SocialMedia;
use Aptitus\Fairs\Domain\Model\Fairs\SocialMediaRepository;

/**
 * Class DoctrineSocialMediaRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineSocialMediaRepository extends DoctrineRepository implements SocialMediaRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(SocialMedia $socialMedia)
    {
        $this->em->persist($socialMedia);
        $this->em->flush($socialMedia);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findSocialMediasByCompanyFair($companyFair)
    {
        return $this->repository->findBy(['companyFair' => $companyFair->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(SocialMedia $socialMedia)
    {
        $this->em->remove($socialMedia);
        $this->em->flush($socialMedia);
    }

    /**
     * {@inheritdoc}
     */
    public function getSocialMediaByCompanyFair($companyFairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('sm.link, sm.type as name')
            ->from('Fairs:Fairs\SocialMedia', 'sm')
            ->where('sm.companyFair = :companyFairId')
            ->setParameter('companyFairId', $companyFairId);

        return $query->getQuery()->getResult();
    }
}
