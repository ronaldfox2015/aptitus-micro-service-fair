<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandTypeModel
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandTypeModel extends Entity
{
    /**
     * @var StandType
     */
    public $standType;

    /**
     * @var StandModel
     */
    public $standModel;
}
