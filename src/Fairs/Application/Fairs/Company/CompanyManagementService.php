<?php

namespace Aptitus\Fairs\Application\Fairs\Company;

use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyInput;
use Aptitus\Fairs\Application\Base\StandTypeService;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Customers\CompanyRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Document;
use Aptitus\Fairs\Domain\Model\Fairs\DocumentRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandType;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\TypeState;
use Aptitus\Fairs\Domain\Model\Fairs\FairRepository;
use Aptitus\Fairs\Domain\Model\Fairs\ImageGallery;
use Aptitus\Fairs\Domain\Model\Fairs\ImageGalleryRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Profile;
use Aptitus\Fairs\Domain\Model\Fairs\ProfileRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Repository\CompanyFairRepository;
use Aptitus\Fairs\Domain\Model\Fairs\SocialMedia;
use Aptitus\Fairs\Domain\Model\Fairs\SocialMediaRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Stand;
use Aptitus\Fairs\Domain\Model\Fairs\StandAmphitryonRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandColor;
use Aptitus\Fairs\Domain\Model\Fairs\StandColorRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandImage;
use Aptitus\Fairs\Domain\Model\Fairs\StandImageRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandModelRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideo;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideoRepository;
use Aptitus\Fairs\Domain\Model\Fairs\StandVideoType;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CompanyManagementService
 *
 * @package Aptitus\Fairs\Application\Fairs\Company
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class CompanyManagementService
{
    private $standTypeService;
    private $companyRepository;
    private $companyFairRepository;
    private $fairRepository;
    private $standRepository;
    private $standTypeRepository;
    private $standModelRepository;
    private $standAmphitryonRepository;
    private $standColorRepository;
    private $standImageRepository;
    private $standVideoRepository;
    private $profileRepository;
    private $socialMediaRepository;
    private $imageGalleryRepository;
    private $documentRepository;

    public function __construct(
        StandTypeService $standTypeService,
        CompanyRepository $companyRepository,
        CompanyFairRepository $companyFairRepository,
        FairRepository $fairRepository,
        StandRepository $standRepository,
        StandTypeRepository $standTypeRepository,
        StandModelRepository $standModelRepository,
        StandAmphitryonRepository $standAmphitryonRepository,
        StandColorRepository $standColorRepository,
        StandImageRepository $standImageRepository,
        StandVideoRepository $standVideoRepository,
        ProfileRepository $profileRepository,
        SocialMediaRepository $socialMediaRepository,
        ImageGalleryRepository $imageGalleryRepository,
        DocumentRepository $documentRepository
    ) {
        $this->standTypeService = $standTypeService;
        $this->companyRepository = $companyRepository;
        $this->companyFairRepository = $companyFairRepository;
        $this->fairRepository = $fairRepository;
        $this->standRepository = $standRepository;
        $this->standTypeRepository = $standTypeRepository;
        $this->standModelRepository = $standModelRepository;
        $this->standAmphitryonRepository = $standAmphitryonRepository;
        $this->standColorRepository = $standColorRepository;
        $this->standImageRepository = $standImageRepository;
        $this->standVideoRepository = $standVideoRepository;
        $this->profileRepository = $profileRepository;
        $this->socialMediaRepository = $socialMediaRepository;
        $this->imageGalleryRepository = $imageGalleryRepository;
        $this->documentRepository = $documentRepository;
    }

    /**
     * @param CompanyInput $data
     */
    public function add(CompanyInput $data)
    {
        $fair = $this->fairRepository->findById($data->fairId());

        if ($fair == null) {
            throw new BadRequestHttpException('La feria no existe');
        }

        $company = $this->validateCompany($data);

        $companyFair = $this->companyFairRepository->isCompanyInFair(
            $fair->getId(),
            $data->documentNumber(),
            $data->category()
        );

        if( !is_null($companyFair) ){
            throw new BadRequestHttpException(
                sprintf('La empresa ya ha sido agregada a la feria con la categoría %s', $data->category())
            );
        }

        $this->standTypeService->validateRulesByStandTypeId($data->stand());

        $companyFair = new CompanyFair();
        $companyFair->setCategory($data->category());
        $companyFair->setIndustryId($data->industryId());
        $companyFair->setIndustryName($data->industryName());
        $companyFair->setFair($fair);
        $companyFair->setCompany($company);
        $companyFair->setMapping($data->desktopCoordinates());
        $companyFair->setMappingTablet($data->tabletCoordinates());
        $companyFair->setOfferType($data->offerType());

        $this->companyFairRepository->persist($companyFair);

        $standType = $this->standTypeRepository->findById($data->stand()['type_id']);
        $standModel = $this->standModelRepository->findById($data->stand()['model_id']);
        $standAmphitryon = $this->standAmphitryonRepository->findById($data->stand()['amphitryon']);

        $stand = new Stand();
        $stand->setCompanyFair($companyFair);
        $stand->setStandType($standType);
        $stand->setStandModel($standModel);
        $stand->setStandAmphitryon($standAmphitryon);

        $this->standRepository->persist($stand);

        //color
        foreach ($data->stand()['colors'] as $key => $color) {
            $standColor = new StandColor();
            $standColor->setName($color);
            $standColor->setType($key);
            $standColor->setStand($stand);

            $this->standColorRepository->persist($standColor);
        }

        //images
        foreach ($data->stand()['images'] as $image) {
            $standImage = new StandImage();
            $standImage->setName($image['name']);
            $standImage->setType($image['type']);
            $standImage->setStand($stand);

            $this->standImageRepository->persist($standImage);
        }

        //video
        if ($data->stand()['type_id'] != StandType::BRONZE_ID) {
            $standVideo = new StandVideo();
            $standVideo->setName($data->stand()['video']);
            $standVideo->setType(StandVideoType::MONITOR);
            $standVideo->setStand($stand);

            $this->standVideoRepository->persist($standVideo);
        }

        //profile
        foreach ($data->profile() as $pf) {
            $profile = new Profile();
            $profile->setCompanyFair($companyFair);
            $profile->setLabel($pf['title']);
            $profile->setDescription($pf['description']);

            $this->profileRepository->persist($profile);
        }

        //social_media
        foreach ($data->socialMedia() as $sm) {
            $socialMedia = new SocialMedia();
            $socialMedia->setCompanyFair($companyFair);
            $socialMedia->setLink($sm['link']);
            $socialMedia->setType($sm['name']);

            $this->socialMediaRepository->persist($socialMedia);
        }

        //image_gallery
        foreach ($data->imageGallery() as $ig) {
            $imageGallery = new ImageGallery();
            $imageGallery->setCompanyFair($companyFair);
            $imageGallery->setName($ig['name']);

            $this->imageGalleryRepository->persist($imageGallery);
        }

        //document
        foreach ($data->document() as $doc) {
            $document = new Document();
            $document->setCompanyFair($companyFair);
            $document->setName($doc['name']);
            $document->setTitle($doc['title']);

            $this->documentRepository->persist($document);
        }
    }

    /**
     * @param CompanyInput $data
     */
    public function update(CompanyInput $data)
    {
        $fair = $this->fairRepository->findById($data->fairId());

        if($fair == null) {
            throw new BadRequestHttpException('La feria no existe');
        }

        $company = $this->validateCompany($data);

        //En caso quiero agregar un nuevo ruc
        /** @var CompanyFair $companyFair */
        $companyFair = $this->companyFairRepository->isCompanyInFair(
            $fair->getId(),
            $company->getRuc(),
            $data->category(),
            $data->companyId(),
            $data->category() != $data->oldCategory(),
            $company->getId(),
            $data->companyId() != $company->getId()
        );

        if( !is_null($companyFair) ){
            throw new BadRequestHttpException(
                sprintf('La empresa ya ha sido agregada a la feria con la categoría %s', $data->category())
            );
        }

        $this->standTypeService->validateRulesByStandTypeId($data->stand());

        $isUpdateCategory = $data->category() != $data->oldCategory();

        $documentNumber = $data->documentNumber();
        //Case when Admin change Ruc, we need the old RUc
        if ($data->companyId() != $company->getId()) {
            $actualCompany = $this->companyRepository->findById($data->companyId());
            $documentNumber = $actualCompany->getRuc();
        }

        $companyFair = $this->companyFairRepository->isCompanyInFair(
            $fair->getId(),
            $documentNumber,
            (($isUpdateCategory) ? $data->oldCategory() : $data->category())
        );

        $companyFair->setCategory($data->category());
        $companyFair->setIndustryId($data->industryId());
        $companyFair->setIndustryName($data->industryName());
        $companyFair->setCompany($company);
        $companyFair->setMapping($data->desktopCoordinates());
        $companyFair->setMappingTablet($data->tabletCoordinates());
        $companyFair->setOfferType($data->offerType());
        $this->companyFairRepository->merge($companyFair);

        $standType = $this->standTypeRepository->findById($data->stand()['type_id']);
        $standModel = $this->standModelRepository->findById($data->stand()['model_id']);
        $standAmphitryon = $this->standAmphitryonRepository->findById($data->stand()['amphitryon']);

        $stand = $this->standRepository->findStandByCompanyFair($companyFair);
        $stand->setStandType($standType);
        $stand->setStandModel($standModel);
        $stand->setStandAmphitryon($standAmphitryon);

        $this->standRepository->merge($stand);

        //color
        $standColors = $this->standColorRepository->findStandColorsByStand($stand);

        foreach ($standColors as $standColor) {
            $standColor->setName($data->stand()['colors'][$standColor->getType()]);

            $this->standColorRepository->merge($standColor);
        }

        //images
        $standImages = $this->standImageRepository->findStandImagesByStand($stand);

        foreach ($standImages as $standImage) {
            $this->standImageRepository->remove($standImage);
        }

        foreach ($data->stand()['images'] as $image) {
            $standImage = new StandImage();
            $standImage->setName($image['name']);
            $standImage->setType($image['type']);
            $standImage->setStand($stand);

            $this->standImageRepository->persist($standImage);
        }

        //video
        $standVideo = $this->standVideoRepository->findStandVideoByStand($stand);
        if ($data->stand()['type_id'] != StandType::BRONZE_ID) {
            if (is_null($standVideo)) {
                $standVideo = new StandVideo();
                $standVideo->setName($data->stand()['video']);
                $standVideo->setType(StandVideoType::MONITOR);
                $standVideo->setStand($stand);

                $this->standVideoRepository->persist($standVideo);
            } else {
                $standVideo->setName($data->stand()['video']);
                $this->standVideoRepository->merge($standVideo);
            }
        } else {
            if (! is_null($standVideo)) {
                $this->standVideoRepository->remove($standVideo);
            }
        }

        //profile
        $profiles = $this->profileRepository->findProfileByCompanyFair($companyFair);

        foreach ($profiles as $profile) {
            $this->profileRepository->remove($profile);
        }

        foreach ($data->profile() as $pf) {
            $profile = new Profile();
            $profile->setCompanyFair($companyFair);
            $profile->setLabel($pf['title']);
            $profile->setDescription($pf['description']);

            $this->profileRepository->persist($profile);
        }

        //social_media
        $socialMedias = $this->socialMediaRepository->findSocialMediasByCompanyFair($companyFair);

        foreach ($socialMedias as $socialMedia){
            $this->socialMediaRepository->remove($socialMedia);
        }

        foreach ($data->socialMedia() as $sm) {
            $socialMedia = new SocialMedia();
            $socialMedia->setCompanyFair($companyFair);
            $socialMedia->setLink($sm['link']);
            $socialMedia->setType($sm['name']);

            $this->socialMediaRepository->persist($socialMedia);
        }

        //image_gallery
        $imageGalleries = $this->imageGalleryRepository->findImageGalleriesByCompanyFair($companyFair);

        foreach ($imageGalleries as $imageGallery){
            $this->imageGalleryRepository->remove($imageGallery);
        }

        foreach ($data->imageGallery() as $ig) {
            $imageGallery = new ImageGallery();
            $imageGallery->setCompanyFair($companyFair);
            $imageGallery->setName($ig['name']);

            $this->imageGalleryRepository->persist($imageGallery);
        }

        //document
        $documents = $this->documentRepository->findDocumentsByCompanyFair($companyFair);

        foreach ($documents as $document){
            $this->documentRepository->remove($document);
        }

        foreach ($data->document() as $doc) {
            $document = new Document();
            $document->setCompanyFair($companyFair);
            $document->setName($doc['name']);
            $document->setTitle($doc['title']);

            $this->documentRepository->persist($document);
        }
    }

    public function removeFromFair($fairId, $companyId, $category)
    {
        $this->validateCompanyFair($fairId, $companyId);
        /** @var CompanyFair $companyFair */
        $companyFair = $this->companyFairRepository->findByCompanyId($fairId, $companyId, $category);

        if (is_null($companyFair)) {
            throw new NotFoundHttpException("No se encontró la Empresa con la categoría $category en la Feria.");
        } else {
            $companyFair->setState(TypeState::INACTIVE);
            $this->companyFairRepository->update($companyFair);
        }
    }

    private function validateCompanyFair($fairId, $companyId)
    {
        $fair = $this->fairRepository->findById($fairId);

        if (is_null($fair)) {
            throw new NotFoundHttpException('No se encontró la Feria.');
        }

        $company = $this->companyRepository->findById($companyId);

        if (is_null($company)) {
            throw new NotFoundHttpException('No se encontró la Empresa.');
        }
    }

    private function validateCompany(CompanyInput $data)
    {
        $company = $this->companyRepository->findByRuc($data->documentNumber(), $data->category());

        if (is_null($company)) {
            $company = new Company();
            $company->setRuc($data->documentNumber());
            $company->setTradeName($data->tradeName());
            $company->setSlug($data->slug());
            $company->setBusinessName($data->businessName());
            $company->setImage($data->logo());
            $company->setLatitude($data->latitude());
            $company->setLongitude($data->longitude());
            $company->setCategory($data->category());

            $this->companyRepository->persist($company);
        } else {
            $company->setTradeName($data->tradeName());
            $company->setBusinessName($data->businessName());
            $company->setSlug($data->slug());
            $company->setImage($data->logo());
            $company->setLatitude($data->latitude());
            $company->setLongitude($data->longitude());
            $company->setCategory($data->category());

            $this->companyRepository->merge($company);
        }

        return $company;
    }
}
