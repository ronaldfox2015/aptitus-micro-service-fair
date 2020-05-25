<?php

namespace Aptitus\Fairs\Domain\Model\Fairs\Enum;

use Aptitus\Common\AbstractEnum;

/**
 * Class StandTypeRules
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs\Enum
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class StandTypeRules extends AbstractEnum
{
    const COLOR_1 = 'Color 1';
    const COLOR_2 = 'Color 2';
    const IMAGE_MONITOR = 'Imagen Monitor';
    const IMAGE_TOTEM = 'Imagen Totem';
    const IMAGE_BANDEROLE_1 = 'Imagen Banderola 1';
    const IMAGE_BANDEROLE_2 = 'Imagen Banderola 2';
    const IMAGE_POSTER_1 = 'Poster 1';
    const IMAGE_POSTER_2 = 'Poster 2';
    const IMAGE_TOP = 'Logo Top';
    const IMAGE_COUNTER = 'Imagen Mostrador';
    const AMPHITRYON = 'Anfitrión';
    const VIDEO = 'Video Youtube';
}
