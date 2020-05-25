<?php

namespace Aptitus\Fairs\Domain\Model\Customers;

/**
 * Interface EducationRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Customers
 * @author Jairo Rojas <jairo.rafa.1997@gmail.com>
 * @copyright (c) 2018, Orbis
 */
interface EducationRepository
{
    /**
     * @param $params
     * @return mixed
     */
    public function findEducationRecords($params);
}
