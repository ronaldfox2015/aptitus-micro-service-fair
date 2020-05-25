<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\ImageGallery;
use Aptitus\Fairs\Domain\Model\Fairs\ImageGalleryRepository;

/**
 * Class DoctrineImageGalleryRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineImageGalleryRepository extends DoctrineRepository implements ImageGalleryRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(ImageGallery $imageGallery)
    {
        $this->em->persist($imageGallery);
        $this->em->flush($imageGallery);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findImageGalleriesByCompanyFair($companyFair)
    {
        return $this->repository->findBy(['companyFair' => $companyFair->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(ImageGallery $imageGallery)
    {
        $this->em->remove($imageGallery);
        $this->em->flush($imageGallery);
    }

    /**
     * {@inheritdoc}
     */
    public function getImageGalleryByCompanyFair($companyFairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('ig.name')
            ->from('Fairs:Fairs\ImageGallery', 'ig')
            ->where('ig.companyFair = :companyFairId')
            ->setParameter('companyFairId', $companyFairId);

        return $query->getQuery()->getResult();
    }
}
