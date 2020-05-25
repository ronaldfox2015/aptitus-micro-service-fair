<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class SponsorRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
interface SponsorRepository
{
    /**
     * @param Sponsor $sponsor
     * @return mixed
     */
    public function persist(Sponsor $sponsor);

    /**
     * @return Sponsor[]
     */
    public function listAllActiveSponsors();

    /**
     * @param Sponsor $sponsor
     * @return mixed
     */
    public function remove(Sponsor $sponsor);

    /**
     * @param $sponsorId
     * @return Sponsor
     */
    public function find($sponsorId);
}