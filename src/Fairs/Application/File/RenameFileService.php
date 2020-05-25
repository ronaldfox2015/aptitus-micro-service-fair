<?php

namespace Aptitus\Fairs\Application\File;

/**
 * Class RenameFileService
 *
 * @package Aptitus\Fairs\Application\File
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class RenameFileService
{
    public function rename()
    {
        $nick = 'fair-';

        return $nick . md5(microtime() . $nick);
    }
}