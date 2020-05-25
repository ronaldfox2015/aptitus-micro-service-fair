<?php

namespace Aptitus\Fairs\Common\Util\File;

use Aptitus\Fairs\Common\Util\File\FileData;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class PathInfo
 *
 * @package Aptitus\Fairs\Common\Util\File
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class FileInput
{
    /** @var  array */
    private $pathInfo;

    /** @var UploadedFile  */
    private $path;

    /**
     * File constructor.
     * @param $path UploadedFile
     */
    public function __construct($path)
    {
        $this->pathInfo = pathinfo($path->getClientOriginalName());
        $this->path = $path;
    }

    /**
     * retorna el nombre del archivo con la extesion
     * @return string
     */
    public function getBaseName()
    {
        return $this->pathInfo['basename'];
    }

    /**
     * retorna el nombre del archivo sin la extension
     * @return string
     */
    public function getFileName()
    {
        return $this->pathInfo['filename'];
    }

    public function setFileName($name)
    {
        return $this->pathInfo['filename'] = $name;
    }

    /**
     * retorna la ruta de la carpeta contenedora
     * @return string
     */
    public function getDirName()
    {
        return $this->pathInfo['dirname'];
    }

    /**
     * retorna la extension del archivo
     * si no existe retorna vacio
     * @return string
     */
    public function getExtension()
    {
        return isset($this->pathInfo['extension']) ?
            $this->pathInfo['extension'] :
            FileData::getExtension($this->getType());
    }

    public function getType()
    {
        return isset($this->pathInfo['type']) ?
            $this->pathInfo['type'] :
            $this->path['type'];
    }

    public function getSize()
    {
        return $this->path->getSize();
    }

    /**
     * retorna la ruta original del archivo
     * @return string
     */
    public function getPath()
    {
        return $this->path->getRealPath();
    }

    /**
     * retorna si un archivo existe o no
     * @return bool
     */
    public function fileExists()
    {
        return file_exists($this->getPath());
    }
}
