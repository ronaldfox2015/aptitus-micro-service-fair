<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandRepository
{
    /**
     * @param Stand $stand
     * @return mixed
     */
    public function persist(Stand $stand);

    /**
     * @param CompanyFair $companyFair
     * @return Stand
     */
    public function findStandByCompanyFair(CompanyFair $companyFair);

    /**
     * @param Stand $stand
     * @return mixed
     */
    public function merge(Stand $stand);

    /**
     * @param $companyFairId
     * @return mixed
     */
    public function getStandByCompanyFair($companyFairId);
}
