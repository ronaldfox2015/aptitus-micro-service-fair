<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandTypeModelRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandTypeModelRepository
{
    /**
     * @param $standTypeId
     * @return StandTypeModel[]
     */
    public function findByStandTypeId($standTypeId);
}
