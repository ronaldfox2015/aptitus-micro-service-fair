<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Fair;
use Aptitus\Fairs\Domain\Model\Fairs\Sponsor;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorFair;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorFairRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DoctrineSponsorFairRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class DoctrineSponsorFairRepository extends DoctrineRepository implements SponsorFairRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(SponsorFair $sponsor)
    {
        $this->em->persist($sponsor);
        $this->em->flush($sponsor);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(SponsorFair $sponsor)
    {
        $this->em->merge($sponsor);
        $this->em->flush($sponsor);
    }

    /**
     * {@inheritdoc}
     */
    public function find($sponsorId)
    {
        $sponsor = $this->repository->find($sponsorId);

        if (empty($sponsor)) {
            throw new NotFoundHttpException(sprintf('El patrocinador con el id %s no existe.', $sponsorId));
        }

        return $sponsor;
    }

    /**
     * {@inheritdoc}
     */
    public function listAllActiveSponsorsByFair($category, Fair $fair)
    {
        $filters['state'] = Sponsor::ACTIVATE;
        $filters['fair'] = $fair;

        if (!empty($category)) {
            $filters['category'] = $category;
        }

        return $this->repository->findBy($filters);
    }
}