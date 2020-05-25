<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\OrderType;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\TypeState;
use Aptitus\Fairs\Domain\Model\Fairs\Repository\CompanyFairRepository;

/**
 * Class DoctrineCompanyFairRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineCompanyFairRepository extends DoctrineRepository implements CompanyFairRepository
{
    /**
     * {@inheritdoc}
     */
    public function findByCompanyId($fairId, $companyId, $category = null)
    {
        return $this->repository->findOneBy([
            'fair' => $fairId,
            'company' => $companyId,
            'category' => $category,
            'state' => TypeState::ACTIVE
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function update(CompanyFair $company)
    {
        $this->em->merge($company);
        $this->em->flush($company);
    }

    /**
     * {@inheritdoc}
     */
    public function persist(CompanyFair $companyFair)
    {
        $this->em->persist($companyFair);
        $this->em->flush($companyFair);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isCompanyInFair(
        $fairId,
        $ruc,
        $category,
        $companyId = 0,
        $isUpdateCategory = false,
        $newCompanyId = 0,
        $isNewCompany = false
    ) {

        $query = $this->repository->createQueryBuilder('cf')
            ->select('cf')
            ->join('cf.company', 'c')
            ->join('cf.fair', 'f')
            ->where('f.id = :fairId')
            ->andWhere('c.ruc = :ruc')
            ->andWhere('c.category = :category')
            ->andWhere('cf.category = :category')
            ->andWhere('cf.state = :state')
            ->andWhere('c.state = :state');

        $parameters = ['fairId' => $fairId, 'ruc' => $ruc, 'category' => $category, 'state' => CompanyFair::ACTIVE];

        if ($companyId > 0 && ! $isNewCompany) {
            $query = $query->andWhere(sprintf('c.id %s :companyId', ($isUpdateCategory ? '=' : '<>')));
            $parameters['companyId'] = $companyId;
        } elseif ($isNewCompany && $newCompanyId > 0) { //When Admin change ruc and have new Company
            $query = $query->andWhere('c.id = :companyId');
            $parameters['companyId'] = $newCompanyId;
        }

        $companyFair = $query
            ->setParameters($parameters)
            ->getQuery()
            ->getOneOrNullResult();

        return $companyFair;
    }

    /**
     * {@inheritdoc}
     */
    public function merge(CompanyFair $companyFair)
    {
        $this->em->merge($companyFair);
        $this->em->flush($companyFair);
    }

    /**
     * {@inheritdoc}
     */
    public function listAll($fairId)
    {
        $query = $this->em->createQueryBuilder()
            ->select('c.ruc AS document_number, c.slug, st.id, st.name AS stand_type')
            ->from('Fairs:Fairs\Stand', 's')
            ->innerJoin('s.standType', 'st')
            ->innerJoin('s.companyFair', 'cf')
            ->innerJoin('cf.company', 'c')
            ->where('cf.fair = :fairId')
            ->andWhere('cf.state = :fairState')
            ->orderBy('st.id', OrderType::ASC)
            ->addOrderBy('c.businessName', OrderType::ASC)
            ->setParameters([
                'fairId' => $fairId,
                'fairState' => TypeState::ACTIVE
            ]);

        return $query->getQuery()->getResult();
    }
}
