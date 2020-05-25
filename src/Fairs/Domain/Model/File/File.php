<?php

namespace Aptitus\Fairs\Domain\Model\File;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class File
 *
 * @package Aptitus\Fairs\Domain\Model\File
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class File extends Entity
{
    public $content;
    public $extension;

    /**
     * File constructor.
     * @param $content
     * @param $extension
     */
    public function __construct($content, $extension)
    {
        $this->content = $content;
        $this->extension = $extension;
    }
}
