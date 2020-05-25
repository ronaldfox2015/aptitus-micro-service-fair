<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyFilterInput;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Customers\CompanyRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\TypeState;

/**
 * Class DoctrineCompanyRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class DoctrineCompanyRepository extends DoctrineRepository implements CompanyRepository
{
    /**
     * {@inheritdoc}
     */
    public function listAll($fairId, CompanyFilterInput $filter)
    {
        $query = $this->em->createQueryBuilder()
            ->select('c.id as id, c.businessName as name, c.tradeName as trade_name, c.slug, c.image, cf.category as category, cf.industryName as industry, ' .
                ' c.ruc as document_number, sm.name as model, st.name as stand, cf.mapping, cf.mappingTablet as mapping_tablet')
            ->from('Fairs:Fairs\Stand', 's')
            ->innerJoin('s.standType', 'st')
            ->innerJoin('s.standModel', 'sm')
            ->innerJoin('s.companyFair', 'cf')
            ->innerJoin('cf.company', 'c')
            ->where('cf.fair = :fairId')
            ->andWhere('cf.state = :fairState');

        if (!empty($filter->sort())) {
            $query = $query->orderBy($filter->sort(), $filter->order());
        } else {
            $query = $query->orderBy('st.id', 'ASC')
                ->addOrderBy('c.businessName', 'ASC');
        }

        $parameters = [
            'fairId' => $fairId,
            'fairState' => TypeState::ACTIVE
        ];

        if ($filter->category() != null) {
            $query->andWhere('cf.category = :category');
            $query->andWhere('c.category = :category');
            $parameters['category'] = $filter->category();
        }

        $query->setParameters($parameters);

        return $query->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function persist(Company $company)
    {
        $this->em->persist($company);
        $this->em->flush($company);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findByRuc($ruc, $category)
    {
        return $this->repository->findOneBy([
            'ruc' => $ruc,
            'category' => $category
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCompanyBySlug($slug)
    {
        $query = $this->em->createQueryBuilder()
            ->select('c.id, c.slug, c.ruc as document_number, c.tradeName as trade_name, ' .
                'c.businessName as business_name, c.image as logo')
            ->from('Fairs:Customers\Company', 'c')
            ->where('c.state = :state')
            ->andWhere('c.slug = :slug')
            ->setParameters([
                'slug' => $slug,
                'state' => TypeState::ACTIVE
            ]);

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function getDetail($fairId, $identifier, $category)
    {
        $query = $this->em->createQueryBuilder()
            ->select('cf.id', 'c.ruc as document_number, c.tradeName as trade_name, ' .
                'c.slug, c.businessName as business_name, c.id as company_id, c.latitude, c.longitude, ' .
                'c.image as logo, cf.category as category, cf.industryId as industry_id, cf.offerType as offer_type, '.
                'cf.mapping, cf.mappingTablet as mapping_tablet')
            ->from('Fairs:Fairs\CompanyFair', 'cf')
            ->innerJoin('cf.company', 'c')
            ->where('cf.fair = :fairId')
            ->andWhere('cf.category = :category')
            ->andWhere('c.category = :category')
            ->andWhere('cf.state = :fairState');

        $parameters = [
            'fairId' => $fairId,
            'category' => $category,
            'fairState' => TypeState::ACTIVE
        ];

        if (is_numeric($identifier)) {
            $query->andWhere('cf.company = :companyId');
            $parameters['companyId'] = $identifier;
        } else {
            $query->andWhere('c.slug = :slug');
            $parameters['slug'] = $identifier;
        }

        $query->setParameters($parameters);

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function merge(Company $company)
    {
        $this->em->merge($company);
        $this->em->flush($company);
    }

    /**
     * {@inheritdoc}
     */
    public function findById($companyId)
    {
        return $this->repository->find($companyId);
    }

    /**
     * {@inheritdoc}
     */
    public function listCompanyIds($fairId, $category)
    {
        $query = $this->em->createQueryBuilder()
            ->select('cf.offerType', 'c.ruc')
            ->from('Fairs:Fairs\CompanyFair', 'cf')
            ->innerJoin('cf.company', 'c')
            ->Where('cf.category = :category')
            ->andWhere('c.category = :category')
            ->andWhere('cf.state = :fairState');

        $parameters = [
            'category' => $category,
            'fairState' => TypeState::ACTIVE
        ];

        $query->setParameters($parameters);

        return $query->getQuery()->getArrayResult();
    }
}
