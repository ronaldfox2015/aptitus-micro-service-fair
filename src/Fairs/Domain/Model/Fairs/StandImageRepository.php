<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandImageRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandImageRepository
{
    /**
     * @param StandImage $standImage
     * @return mixed
     */
    public function persist(StandImage $standImage);

    /**
     * @param Stand $stand
     * @return array
     */
    public function findStandImagesByStand(Stand $stand);

    /**
     * @param StandImage $standImage
     * @return mixed
     */
    public function remove(StandImage $standImage);

    /**
     * @param $standId
     * @return mixed
     */
    public function getImageByStandId($standId);
}
