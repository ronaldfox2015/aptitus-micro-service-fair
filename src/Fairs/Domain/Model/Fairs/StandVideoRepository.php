<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class StandVideoRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface StandVideoRepository
{
    /**
     * @param StandVideo $standVideo
     * @return mixed
     */
    public function persist(StandVideo $standVideo);

    /**
     * @param Stand $stand
     * @return mixed
     */
    public function findStandVideoByStand(Stand $stand);

    /**
     * @param StandVideo $standVideo
     * @return mixed
     */
    public function merge(StandVideo $standVideo);

    /**
     * @param $standId
     * @return mixed
     */
    public function getVideoByStandId($standId);

    /**
     * @param StandVideo $standVideo
     * @return mixed
     */
    public function remove(StandVideo $standVideo);
}
