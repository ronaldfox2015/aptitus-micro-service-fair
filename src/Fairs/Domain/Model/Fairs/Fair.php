<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;
use DateTime;

/**
 * Class Fair
 *
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class Fair extends Entity
{
    const FEATURED_SLUG = 'avisos-destacados';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $image;

    /**
     * @var string
     */
    public $slogan;

    /**
     * @var DateTime
     */
    public $startDate;

    /**
     * @var DateTime
     */
    public $endDate;

    /**
     * @var DateTime
     */
    public $createAt;

    /**
     * @var int
     */
    public $state;
}
