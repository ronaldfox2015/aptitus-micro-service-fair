<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandTypeRules
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class StandTypeRule extends Entity
{
    /**
     * @var StandType
     */
    public $standType;

    /**
     * @var string
     */
    public $rule;

    /**
     * @var int
     */
    public $required;

    /**
     * @var int
     */
    public $state;
}
