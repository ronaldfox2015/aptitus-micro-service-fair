<?php

namespace Aptitus\Fairs\Domain\Model\Fairs\Repository;

use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;

/**
 * Class CompanyFairRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
interface CompanyFairRepository
{
    /**
     * @param int $fairId
     * @param int $companyId
     * @param null|string $category
     * @return CompanyFair
     */
    public function findByCompanyId($fairId, $companyId, $category = null);

    /**
     * @param CompanyFair $company
     * @return bool
     */
    public function update(CompanyFair $company);

    /**
     * @param CompanyFair $company
     * @return bool
     */
    public function persist(CompanyFair $company);

    /**
     * @param $fairId
     * @param $ruc
     * @param $category
     * @param int $companyId
     * @param bool $isUpdateCategory
     * @param int $newCompanyId
     * @param bool $isNewCompany
     * @return mixed
     */
    public function isCompanyInFair(
        $fairId,
        $ruc,
        $category,
        $companyId = 0,
        $isUpdateCategory = false,
        $newCompanyId = 0,
        $isNewCompany = false
    );

    /**
     * @param CompanyFair $companyFair
     * @return bool
     */
    public function merge(CompanyFair $companyFair);

    /**
     * @param int $fairId
     * @return array
     */
    public function listAll($fairId);
}
