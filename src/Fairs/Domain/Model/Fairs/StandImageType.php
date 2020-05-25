<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\AbstractEnum;

class StandImageType extends AbstractEnum
{
    const MONITOR = 'image_monitor';
    const TOTEM = 'image_totem';
    const BANDEROLE_RIGHT = 'image_banderole_1';
    const BANDEROLE_LEFT = 'image_banderole_2';
    const POSTER_UP = 'image_poster_1';
    const POSTER_DOWN = 'image_poster_2';
    const TOP = 'image_top';
    const COUNTER = 'image_counter';
}
