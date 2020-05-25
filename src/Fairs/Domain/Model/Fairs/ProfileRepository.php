<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class ProfileRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface ProfileRepository
{
    /**
     * @param Profile $profile
     * @return mixed
     */
    public function persist(Profile $profile);

    /**
     * @param CompanyFair $companyFair
     * @return mixed
     */
    public function findProfileByCompanyFair($companyFair);

    /**
     * @param Profile $profile
     * @return mixed
     */
    public function remove(Profile $profile);

    /**
     * @param int $companyFairId
     * @return mixed
     */
    public function getProfileByCompanyFair($companyFairId);
}
