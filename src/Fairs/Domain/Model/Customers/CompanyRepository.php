<?php

namespace Aptitus\Fairs\Domain\Model\Customers;

use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyFilterInput;

/**
 * Class CompanyRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Customers
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface CompanyRepository
{
    /**
     * @param int $fairId
     * @param CompanyFilterInput $filter
     * @return array
     */
    public function listAll($fairId, CompanyFilterInput $filter);

    /**
     * @param Company $company
     * @return mixed
     */
    public function persist(Company $company);

    /**
     * @param $ruc
     * @param $category
     * @return Company
     */
    public function findByRuc($ruc, $category);

    /**
     * @param $slug
     * @return mixed
     */
    public function getCompanyBySlug($slug);

    /**
     * @param $fairId
     * @param $identifier
     * @param $category
     * @return mixed
     */
    public function getDetail($fairId, $identifier, $category);

    /**
     * @param Company $company
     * @return bool
     */
    public function merge(Company $company);

    /**
     * @param int $companyId
     * @return mixed
     */
    public function findById($companyId);

    /**
     * @param $fairId
     * @param $category
     * @return array
     */
    public function listCompanyIds($fairId, $category);
}
