<?php

namespace Aptitus\Fairs\Application\File;

use Aptitus\Fairs\Common\Util\File\FileData;
use Aptitus\Fairs\Common\Util\File\FileInput;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class FileValidatorService
 *
 * @package Aptitus\Fairs\Application\File
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class FileValidatorService
{
    protected $file;
    protected $message;

    public function __construct($file)
    {
        $this->file = new FileInput($file);
    }

    /**
     * @param $typeFile
     * @param $typeFile
     * @return bool
     */
    public function allValidate($typeFile)
    {
        $options = FileData::EXTENSION($typeFile);

        if (! in_array($this->file->getExtension(), $options)) {
            throw new BadRequestHttpException('El tipo de archivo no esta permitido.');
        }

        if ($this->file->getSize() > FileData::MAX_SIZE) {
            throw new BadRequestHttpException(sprintf('El peso es mayor a %sMb.', FileData::getAllowedSize()));
        }

        return true;
    }
}