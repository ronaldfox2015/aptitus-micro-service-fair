<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandModelRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandModelRepository
{
    /**
     * @param int $standModelId
     * @return StandModel
     */
    public function findById($standModelId);
}
