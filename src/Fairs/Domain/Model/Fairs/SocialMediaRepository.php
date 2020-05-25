<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class SocialMediaRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface SocialMediaRepository
{
    /**
     * @param SocialMedia $socialMedia
     * @return mixed
     */
    public function persist(SocialMedia $socialMedia);

    /**
     * @param CompanyFair $companyFair
     * @return mixed
     */
    public function findSocialMediasByCompanyFair($companyFair);

    /**
     * @param SocialMedia $socialMedia
     * @return mixed
     */
    public function remove(SocialMedia $socialMedia);

    /**
     * @param int $companyFairId
     * @return mixed
     */
    public function getSocialMediaByCompanyFair($companyFairId);
}
