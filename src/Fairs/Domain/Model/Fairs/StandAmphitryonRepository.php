<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandAmphitryonRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandAmphitryonRepository
{
    /**
     * @param int $standAmphitryonId
     * @return StandAmphitryon
     */
    public function findById($standAmphitryonId);
}
