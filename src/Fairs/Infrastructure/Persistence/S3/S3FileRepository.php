<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\S3;

use Aptitus\Common\Adapter\Persistence\S3\Permission;
use Aptitus\Common\Adapter\Persistence\S3\S3Repository;
use Aptitus\Fairs\Application\File\RenameFileService;
use Aptitus\Fairs\Common\Util\File\FileInput;
use Aptitus\Fairs\Domain\Model\File\FileRepository;

/**
 * Class S3ImageRepository
 *
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class S3FileRepository extends S3Repository implements FileRepository
{
    /**
     * {@inheritdoc}
     */
    public function put($serverPath, FileInput $pathInfo, $originalName = false)
    {
        $rename = new RenameFileService();
        $fileName = ($originalName) ? $pathInfo->getFileName() : $rename->rename();
        $nameFileServer = sprintf('%s.%s', $fileName, $pathInfo->getExtension());
        $pathServer = $this->filterPath($serverPath) . $nameFileServer;

        $this->uploadFile($pathServer, $pathInfo->getPath());
        @unlink($pathInfo->getPath());

        return $nameFileServer;
    }

    public function uploadFile($name, $path)
    {
        $result = $this->client->putObject(
            [
                'Bucket' => $this->getBucket(),
                'Key' => $this->getFolderName($name),
                'Body' => fopen($path, 'r'),
                'ACL' => Permission::PUBLIC_READ
            ]
        );

        return $result;
    }

    private function filterPath($folderS3)
    {
        $folderS3 = ltrim($folderS3, '/').'/';
        return str_replace('//', '/', $folderS3);
    }
}
