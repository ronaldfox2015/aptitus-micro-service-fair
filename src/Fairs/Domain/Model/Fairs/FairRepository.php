<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class FairRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface FairRepository
{
    /**
     * @param int $fairId
     * @return Fair
     */
    public function findById($fairId);
}
