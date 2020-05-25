<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandTypeAmphitryonRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandTypeAmphitryonRepository
{
    /**
     * @param $standTypeId
     * @return StandTypeAmphitryon[]
     */
    public function findByStandTypeId($standTypeId);
}
