<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Sponsor;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DoctrineSponsorRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class DoctrineSponsorRepository extends DoctrineRepository implements SponsorRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(Sponsor $sponsor)
    {
        $this->em->persist($sponsor);
        $this->em->flush($sponsor);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function listAllActiveSponsors()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Sponsor $sponsor)
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
    }
}