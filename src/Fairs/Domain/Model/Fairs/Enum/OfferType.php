<?php

namespace Aptitus\Fairs\Domain\Model\Fairs\Enum;

use Aptitus\Common\AbstractEnum;

/**
 * Class CategoryCompany
 *
 * @author Paul Taboada <pacharly89@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class OfferType extends AbstractEnum
{
    const UNDERGRADUATE  = 'pregrado';
    const POSTGRADUATE  = 'postgrado';
    const GRADE      = 'curso';
}
