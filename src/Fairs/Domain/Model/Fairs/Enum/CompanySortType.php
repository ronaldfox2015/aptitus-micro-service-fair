<?php

namespace Aptitus\Fairs\Domain\Model\Fairs\Enum;

use Aptitus\Common\AbstractEnum;

/**
 * Class CompanySortType
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs\Enum
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanySortType extends AbstractEnum
{
    const NAME = 'name';
    const TRADE_NAME = 'trade_name';
    const STAND = 'stand';
}