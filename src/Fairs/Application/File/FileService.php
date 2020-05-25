<?php

namespace Aptitus\Fairs\Application\File;

use Aptitus\Fairs\Common\Util\File\FileInput;
use Aptitus\Fairs\Domain\Model\File\FileRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class FileService
 *
 * @package Aptitus\Fairs\Application\File
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class FileService
{
    private $repository;
    private $config;
    private $folder;

    public function __construct(FileRepository $repository, array $config)
    {
        $this->repository = $repository;
        $this->config = $config;
        $this->folder = $this->config['folders'];
    }

    public function save($file, $type, $folder, $originalName = false)
    {
        $pathInfo = new FileInput($file);
        $validateFile = new FileValidatorService($file);

        if ($validateFile->allValidate($type)) {
            $fileName = $this->repository->put($this->getRoute($this->cleanTypeImage($folder)), $pathInfo, $originalName);
            return [
                'link' => $this->getLink($this->cleanTypeImage($folder), $fileName),
                'name' => $fileName
            ];
        }

        return false;
    }

    private function getRoute($folder)
    {
        $folder =  isset($this->config['folders'][$folder]) ? $this->config['folders'][$folder] : null;

        if (is_null($folder)) {
            throw new BadRequestHttpException('Ruta no existe.');
        }

        return $folder;
    }

    private function cleanTypeImage($type) {
        return str_replace('image_', '', $type);
    }

    private function getLink($type, $image)
    {
        if (!empty($image)) {
            return $this->config['cde'] . $this->filterPath($this->folder[$type]) . $image;
        }
        return null;
    }

    private function filterPath($folderS3)
    {
        $folderS3 = str_replace('/', '', $folderS3);

        $folderS3 = sprintf('%s/', $folderS3);

        return $folderS3;
    }
}
