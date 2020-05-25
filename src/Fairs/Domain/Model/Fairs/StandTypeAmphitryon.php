<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandTypeAmphritryon
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandTypeAmphitryon extends Entity
{
    /**
     * @var StandType
     */
    public $standType;

    /**
     * @var StandAmphitryon
     */
    public $standAmphitryon;
}
