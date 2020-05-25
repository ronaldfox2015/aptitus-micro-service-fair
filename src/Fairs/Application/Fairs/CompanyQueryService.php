<?php

namespace Aptitus\Fairs\Application\Fairs;
use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyFilterInput;
use Aptitus\Fairs\Common\Util\PreviewPagination;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Customers\CompanyRepository;
use Aptitus\Fairs\Domain\Model\Fairs\DocumentRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\CategoryCompany;
use Aptitus\Fairs\Domain\Model\Fairs\ImageGalleryRepository;
use Aptitus\Fairs\Domain\Model\Fairs\ProfileRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Repository\CompanyFairRepository;
use Aptitus\Fairs\Domain\Model\Fairs\SocialMediaRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandColorRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandImageRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideoRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CompanyQueryService
 *
 * @package Aptitus\Fairs\Application\Fairs
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyQueryService
{
    const GALLERY = 'gallery';
    const DOCUMENT = 'document';
    const LOGO = 'logo';
    private $repository;
    private $companyFairRepository;
    private $standColorRepository;
    private $imageGalleryRepository;
    private $documentRepository;
    private $standImageRepository;
    private $standVideoRepository;
    private $profileRepository;
    private $socialMediaRepository;
    private $standRepository;
    private $config;
    private $folder;

    public function __construct(
        CompanyRepository $repository,
        CompanyFairRepository $companyFairRepository,
        StandColorRepository $standColorRepository,
        ImageGalleryRepository $imageGalleryRepository,
        DocumentRepository $documentRepository,
        StandImageRepository $standImageRepository,
        StandVideoRepository $standVideoRepository,
        ProfileRepository $profileRepository,
        SocialMediaRepository $socialMediaRepository,
        StandRepository $standRepository
    ) {
        $this->repository = $repository;
        $this->companyFairRepository = $companyFairRepository;
        $this->standColorRepository = $standColorRepository;
        $this->imageGalleryRepository = $imageGalleryRepository;
        $this->documentRepository = $documentRepository;
        $this->standImageRepository = $standImageRepository;
        $this->standVideoRepository = $standVideoRepository;
        $this->profileRepository = $profileRepository;
        $this->socialMediaRepository = $socialMediaRepository;
        $this->standRepository = $standRepository;
    }

    public function listAll($fairId, CompanyFilterInput $filter)
    {
        if ($filter->category() != null) {
            if (!in_array($filter->category(), [CategoryCompany::JOB, CategoryCompany::EDUCATION])) {
                throw new BadRequestHttpException('La categoría es incorrecto');
            }
        }

        $result = $this->repository->listAll($fairId, $filter);

        return $result;
    }

    public function getCompanyBySlug($slug)
    {
        $result = $this->repository->getCompanyBySlug($slug);
        if (!empty($result)) {
            $result['logo'] = $this->getLink(self::LOGO, $result['logo']);
        }
        if (empty($result)) {
            throw new NotFoundHttpException('No se encontró el detalle de la Empresa.');
        }

        return $result;
    }

    public function getDetail($fairId, $identifier, CompanyFilterInput $filter)
    {
        $result = $this->getMainDetail($fairId, $identifier, $filter->category());

        if (!empty($result)) {
            $result['stand'] = $this->standRepository->getStandByCompanyFair($result['id']);
            $result['stand']['colors'] = $this->getStandColorByStandId($result['stand']['id']);
            $result['stand']['images'] = $this->getImage($result['stand']['id']);
            $result['stand']['video'] = $this->standVideoRepository->getVideoByStandId($result['stand']['id'])['name'];
            $result['profile'] = $this->profileRepository->getProfileByCompanyFair($result['id']);
            $result['social_media'] = $this->socialMediaRepository->getSocialMediaByCompanyFair($result['id']);
            $result['image_gallery'] = $this->getImageGallery($result['id']);
            $result['document'] = $this->getDocument($result['id']);
            $result['coords']['desktop'] = $result['mapping'];
            $result['coords']['tablet'] = $result['mapping_tablet'];

            if ($filter->preview() == PreviewPagination::IS_ACTIVE) {
                $list = $this->listAll($fairId, $filter);
                $pagination = new PreviewPagination($list, $result['company_id']);
                $result['control'] = $pagination->getPreview();
            }

            unset($result['id']);
            unset($result['stand']['id']);
            unset($result['company_id']);
        } else {
            throw new NotFoundHttpException('No se encontró el detalle de la Empresa en la Feria.');
        }

        return $result;
    }

    private function getStandColorByStandId($standId)
    {
        $data = $this->standColorRepository->getStandColorByStandId($standId);
        $result = [];
        foreach ($data as $key => $value) {
            $result[sprintf('color_%s', $key + 1)] = $value['name'];
        }

        return $result;
    }

    public function getConfig(array $config)
    {
        $this->config = $config;
        $this->folder = $this->config['folders'];
    }

    private function getImageGallery($companyFairId)
    {
        $result = $this->imageGalleryRepository->getImageGalleryByCompanyFair($companyFairId);
        foreach ($result as $key => $value) {
            $result[$key]['link'] = $this->getLink(self::GALLERY, $value['name']);
        }

        return $result;
    }

    private function getDocument($companyFairId)
    {
        $result = $this->documentRepository->getDocumentCompanyFair($companyFairId);
        foreach ($result as $key => $value) {
            $result[$key]['link'] = $this->getLink(self::DOCUMENT, $value['name']);
        }

        return $result;
    }

    private function getImage($standId)
    {
        $result = $this->standImageRepository->getImageByStandId($standId);
        foreach ($result as $key => $value) {
            $result[$key]['link'] = $this->getLink($this->cleanTypeImage(
                $result[$key]['type']),
                $value['name']
            );
        }

        return $result;
    }

    private function getMainDetail($fairId, $identifier, $category)
    {
        $result = $this->repository->getDetail($fairId, $identifier, $category);

        return $result;
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
        return sprintf('%s/', str_replace('/', '', $folderS3));
    }

    public function getAllCompaniesIds($fairId, $category)
    {
        $response = [];

        if (!in_array($category, [CategoryCompany::JOB, CategoryCompany::EDUCATION])) {
            throw new BadRequestHttpException('La categoría es incorrecto');
        }

        $result = $this->repository->listCompanyIds($fairId, $category);

        /** @var Company $company */
        foreach ($result as $company) {
            $response[] = $company->getId();
        }

        return $response;
    }
}
