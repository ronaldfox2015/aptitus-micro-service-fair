<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class CompanyFairRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface CompanyFairRepository
{
    /**
     * @param $ruc string
     * @param $category string
     * @param $fairId integer
     * @return mixed
     */
    public function isCompanyInFair($fairId, $ruc, $category);

    /**
     * @param CompanyFair $companyFair
     * @return mixed
     */
    public function persist(CompanyFair $companyFair);
}
