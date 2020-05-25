<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandTypeRuleRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandTypeRuleRepository
{
    /**
     * @param $standTypeId
     * @return StandTypeRule[]
     */
    public function findByStandTypeId($standTypeId);
}
