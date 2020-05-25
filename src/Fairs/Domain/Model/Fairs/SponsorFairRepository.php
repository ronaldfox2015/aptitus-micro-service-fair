<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class SponsorFairRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
interface SponsorFairRepository
{
    /**
     * @param SponsorFair $sponsor
     * @return mixed
     */
    public function persist(SponsorFair $sponsor);

    /**
     * @param Fair $fair
     * @return mixed
     */
    public function listAllActiveSponsorsByFair($category, Fair $fair);

    /**
     * @param SponsorFair $sponsor
     * @return mixed
     */
    public function remove(SponsorFair $sponsor);

    /**
     * @param $sponsorId
     * @return Sponsor
     */
    public function find($sponsorId);
}