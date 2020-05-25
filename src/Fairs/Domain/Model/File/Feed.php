<?php

namespace Aptitus\Fairs\Domain\Model\File;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class Feed
 *
 * @package Aptitus\Fairs\Domain\Model\File
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class Feed extends Entity
{
    const FACEBOOK_FILE_NAME = 'fair-feed-facebook';
    const FOLDER_NAME = 'feed';
    const ACTIVE_JOB = 'in stock';
    const DEFAULT_CONDITION = 'new';
    const DEFAULT_PRICE = 1;
    const FEATURED_STAND_TYPE = 'REGULAR';
    const UTM_SOURCE = 'facebook';
    const UTM_MEDIUM = 'cpc';
    const UTM_CAMPAIGN = 'expoaptitus182';
    const UTM_TERM = 'feed';
    const DEFAULT_ROWS_LIMIT = 1000;
    const EXPOGRADOS_FILE_NAME = 'fair-feed-expogrados';
}
