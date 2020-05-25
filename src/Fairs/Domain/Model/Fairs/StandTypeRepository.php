<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandTypeRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandTypeRepository
{
    /**
     * @param $standTypeId
     * @return StandType
     */
    public function findById($standTypeId);
}
