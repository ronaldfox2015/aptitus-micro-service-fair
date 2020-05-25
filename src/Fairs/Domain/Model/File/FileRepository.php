<?php

namespace Aptitus\Fairs\Domain\Model\File;

use Aptitus\Fairs\Common\Util\File\FileInput;

/**
 * Interface FileRepository
 *
 * @package Aptitus\Fairs\Domain\Model\File
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
interface FileRepository
{
    /**
     * @param string $serverPath ruta de la carpeta en bucket de S3
     * @param FileInput $pathInfo información del archivo
     * @param bool $originalName guardar con nombre original
     * @return boolean
     */
    public function put($serverPath, FileInput $pathInfo, $originalName = false);
}
