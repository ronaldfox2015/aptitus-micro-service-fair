<?php

namespace Aptitus\Fairs\Application\Base;

use Aptitus\Fairs\Application\File\FileService;
use Aptitus\Fairs\Common\Util\File\FileData;
use Aptitus\Fairs\Domain\Model\Customers\JobSearchRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Fair;
use Aptitus\Fairs\Domain\Model\Fairs\Repository\CompanyFairRepository;
use Aptitus\Fairs\Domain\Model\File\Feed;
use Aptitus\Fairs\Infrastructure\Services\LoggerService;
use Aptitus\Fairs\Presentation\FeedFacebookPresentation;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Exception;

/**
 * Class FeedService
 *
 * @package Aptitus\Fairs\Application\Base
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FeedService
{
    private $companyFairRepository;
    private $jobSearchRepository;
    private $fileService;
    private $loggerService;
    private $config;

    public function __construct(
        CompanyFairRepository $companyFairRepository,
        JobSearchRepository $jobSearchRepository,
        FileService $fileService,
        LoggerService $loggerService,
        $config
    ) {
        $this->companyFairRepository = $companyFairRepository;
        $this->jobSearchRepository = $jobSearchRepository;
        $this->fileService = $fileService;
        $this->loggerService = $loggerService;
        $this->config = $config;
    }

    public function generate($fairId)
    {
        try {
            $companies = $this->companyFairRepository->listAll($fairId);
            $fairJobs = $this->findFairJobs($fairId, $companies);

            return $this->generateCsv($fairJobs);

        } catch (Exception $e) {
            $this->loggerService->write(sprintf('Exception - Facebook Feed Generator: %s', $e->getMessage()));
        }
    }

    public function findFairJobs($fairId, $companies)
    {
        $data = [];

        foreach ($companies as $companyStand) {
            $params = ['company' => $companyStand['slug']];

            if ($params['company'] == Fair::FEATURED_SLUG) {
                $params = ['fair' => $fairId];
            }

            $search = $this->jobSearchRepository->findJobs($params);

            if (!empty($search['data'])) {
                foreach ($search['data'] as $job) {
                    $job['company_stand'] = $companyStand;
                    $data[] = $job;
                }
            }
        }

        return $data;
    }

    private function generateCsv($jobs)
    {
        $fileName = sprintf('%s-%s.csv', Feed::FACEBOOK_FILE_NAME, date('Y-m-d'));
        $filePath = sprintf('%s/%s', $this->config['tmp_dir'], $fileName);
        $fp = fopen($filePath, 'w');
        fputcsv($fp, $this->getFacebookColumns());

        foreach ($jobs as $id => $job) {
            $data[$id] = FeedFacebookPresentation::formatData($job, $this->config['expo_aptitus_host']);
            fputcsv($fp, array_values($data[$id]));
        }

        $uploadFile = new UploadedFile($filePath, $fileName);
        $upload = $this->fileService->save($uploadFile, FileData::DOCUMENT, Feed::FOLDER_NAME, true);
        fclose($fp);

        return $upload;
    }

    private function getFacebookColumns()
    {
        return [
            'ID',
            'availability',
            'condition',
            'brand',
            'description',
            'image_link',
            'link',
            'title',
            'price',
            'custom_label_0',
            'custom_label_1',
            'custom_label_2',
            'custom_label_3'
        ];
    }
}
