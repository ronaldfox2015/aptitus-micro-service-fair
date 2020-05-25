<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Document;
use Aptitus\Fairs\Domain\Model\Fairs\DocumentRepository;

/**
 * Class DoctrineDocumentRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineDocumentRepository extends DoctrineRepository implements DocumentRepository
{
    /**
     * {@inheritdoc}
     */
    public function persist(Document $document)
    {
        $this->em->persist($document);
        $this->em->flush($document);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findDocumentsByCompanyFair($companyFair)
    {
        return $this->repository->findBy(['companyFair' => $companyFair->getId()]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Document $document)
    {
        $this->em->remove($document);
        $this->em->flush($document);
    }

    /**
     * {@inheritdoc}
     */
    public function getDocumentCompanyFair($companyFairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('d.name, d.title')
            ->from('Fairs:Fairs\Document', 'd')
            ->where('d.companyFair = :companyFairId')
            ->setParameter('companyFairId', $companyFairId);

        return $query->getQuery()->getResult();
    }
}
