<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandColorRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandColorRepository
{
    /**
     * @param StandColor $standColor
     * @return mixed
     */
    public function persist(StandColor $standColor);

    /**
     * @param Stand $stand
     * @return StandColor[]
     */
    public function findStandColorsByStand(Stand $stand);

    /**
     * @param StandColor $standColor
     * @return mixed
     */
    public function merge(StandColor $standColor);

    /**
     * @param $standId
     * @return mixed
     */
    public function getStandColorByStandId($standId);
}
