<?php

namespace Aptitus\Fairs\Application\Base;

use Aptitus\Fairs\Application\File\FileService;
use Aptitus\Fairs\Common\Util\File\FileData;
use Aptitus\Fairs\Domain\Model\Customers\Category;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Customers\CompanyRepository;
use Aptitus\Fairs\Domain\Model\Customers\EducationRepository;
use Aptitus\Fairs\Domain\Model\File\Feed;
use Aptitus\Fairs\Infrastructure\Services\LoggerService;
use Aptitus\Fairs\Presentation\FeedExpogradosPresentation;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FeedExpoGradosService
 *
 * @package Aptitus\Fairs\Application\Base
 * @author Jairo Rojas <jairo.rafa.1997@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FeedExpoGradosService
{
    private $companyRepository;
    private $educationRepository;
    private $fileService;
    private $loggerService;
    private $config;

    public function __construct(
        CompanyRepository $companyRepository,
        EducationRepository $educationRepository,
        FileService $fileService,
        LoggerService $loggerService,
        $config
    )
    {
        $this->companyRepository = $companyRepository;
        $this->educationRepository = $educationRepository;
        $this->fileService = $fileService;
        $this->loggerService = $loggerService;
        $this->config = $config;
    }

    public function generate($fairId)
    {
        $this->loggerService->write('Feed Generator Expogrados: Start');
        $companies = $this->companyRepository->listCompanyIds($fairId, Category::EDUCATION);
        $fairJobs = $this->findEducationRecords($fairId, $companies);
        return $this->generateCsv($fairJobs['data']);
    }

    public function findEducationRecords($fairId, $companies)
    {
        return $this->educationRepository->findEducationRecords($companies);
    }

    private function generateCsv($jobs)
    {
        try {

            $fileName = sprintf('%s-%s.csv', Feed::EXPOGRADOS_FILE_NAME, date('Y-m-d'));
            $filePath = sprintf('%s/%s', $this->config['tmp_dir'], $fileName);
            $fp = fopen($filePath, 'w');
            fputcsv($fp, $this->getColumns());

            foreach ($jobs as $id => $job) {
                $data[$id] = FeedExpogradosPresentation::formatData($job);
                fputcsv($fp, array_values($data[$id]));
            }

            $uploadFile = new UploadedFile($filePath, $fileName);
            $upload = $this->fileService->save($uploadFile, FileData::DOCUMENT, Feed::FOLDER_NAME, true);
            fclose($fp);
            $upload['link'] = sprintf('%s?v=%s', $upload['link'], time());
            $this->loggerService->write(sprintf('Feed Generator Expogrados: %s', $upload['link']));
            return $upload;

        } catch (Exception $e) {
            $this->loggerService->write(sprintf('Feed Generator Expogrados: %s', $e->getMessage()));
        }
    }

    private function getColumns()
    {
        return [
            'ID',
            'availability',
            'condition',
            'description',
            'image_link',
            'link',
            'title',
            'price',
            'brand',
            'custom_label_0',
            'custom_label_1',
            'custom_label_2',
        ];
    }
}
