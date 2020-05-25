<?php

namespace Aptitus\Fairs\Domain\Model\Customers;

/**
 * Interface JobSearchRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Customers
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
interface JobSearchRepository
{
    /**
     * @param $params
     * @return mixed
     */
    public function findJobs($params);
}
