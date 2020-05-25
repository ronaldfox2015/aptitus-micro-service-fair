<?php

namespace Aptitus\Fairs\Application\Fairs\Sponsor;

use Aptitus\Fairs\Application\Fairs\Sponsor\Data\SponsorInput;
use Aptitus\Fairs\Domain\Model\Customers\Category;
use Aptitus\Fairs\Domain\Model\Fairs\Sponsor;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorFair;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorFairRepository;
use Aptitus\Fairs\Domain\Model\Fairs\SponsorRepository;
use Aptitus\Fairs\Presentation\SponsorPresentation;
use Aptitus\Fairs\Domain\Model\Fairs\FairRepository;
use Aptitus\Fairs\Domain\Model\Fairs\Fair;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SponsorManagementService
 *
 * @package Aptitus\Fairs\Application\Fairs\Sponsor
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class SponsorManagementService
{
    /** @var SponsorRepository $sponsorRepository */
    private $sponsorRepository;

    /** @var SponsorFairRepository $sponsorFairRepository */
    private $sponsorFairRepository;

    /** @var array $config */
    private $config;

    /** @var array $folder */
    private $folder;

    /** @var FairRepository $fairRepository */
    private $fairRepository;

    /**
     * SponsorManagementService constructor.
     * @param SponsorRepository $sponsorRepository
     * @param SponsorFairRepository $sponsorFairRepository
     * @param FairRepository $fairRepository
     */
    public function __construct(
        SponsorRepository $sponsorRepository,
        SponsorFairRepository $sponsorFairRepository,
        FairRepository $fairRepository
    ) {
        $this->sponsorRepository = $sponsorRepository;
        $this->sponsorFairRepository = $sponsorFairRepository;
        $this->fairRepository = $fairRepository;
    }

    /**
     * @param array $config
     */
    public function getConfig(array $config)
    {
        $this->config = $config;
        $this->folder = $this->config['folders'];
    }

    /**
     * @param SponsorInput $input
     * @param $fairId
     * @return mixed
     */
    public function add(SponsorInput $input, $fairId)
    {
        $sponsor = new Sponsor();
        $sponsorFair = new SponsorFair();

        $sponsor->setCompanyName($input->companyName());
        $sponsor->setImage($input->image());
        $sponsor->setUrl($input->url());
        $this->sponsorRepository->persist($sponsor);

        $sponsorFair->setCategory($input->category());
        $sponsorFair->setFair($this->fairRepository->findById($fairId));
        $sponsorFair->setMapping($input->desktopCoordinates());
        $sponsorFair->setMappingTablet($input->tabletCoordinates());
        $sponsorFair->setSponsor($sponsor);
        $sponsorFair->setState(Sponsor::ACTIVATE);

        return $this->sponsorFairRepository->persist($sponsorFair);
    }

    /**
     * @param SponsorInput $input
     * @param $sponsorFairId
     * @return mixed
     */
    public function put(SponsorInput $input, $sponsorFairId)
    {
        if (!is_numeric($sponsorFairId)) {
            throw new BadRequestHttpException(sprintf('El id %s del patrocinador no es válido.', $sponsorFairId));
        }

        /** @var SponsorFair $sponsorFair */
        $sponsorFair = $this->sponsorFairRepository->find($sponsorFairId);
        $sponsorFair->getSponsor()->setCompanyName($input->companyName());
        $sponsorFair->getSponsor()->setImage($input->image());
        $sponsorFair->getSponsor()->setUrl($input->url());
        $sponsorFair->setMapping($input->desktopCoordinates());
        $sponsorFair->setMappingTablet($input->tabletCoordinates());
        $sponsorFair->setCategory($input->category());
        $this->sponsorRepository->persist($sponsorFair->getSponsor());
        return $this->sponsorFairRepository->persist($sponsorFair);
    }

    /**
     * @param $fairId
     * @param $sponsorFairId
     * @return mixed
     */
    public function delete($fairId, $sponsorFairId)
    {
        /** @var SponsorFair $sponsorFair */
        $sponsorFair = $this->sponsorFairRepository->find($sponsorFairId);
        $sponsorFair->setState(Sponsor::NOT_ACTIVATE);

        return $this->sponsorFairRepository->persist($sponsorFair);
    }

    /**
     * @param $fairId
     * @param $sponsorFairId
     * @return mixed
     */
    public function get($fairId, $sponsorFairId)
    {
        /** @var SponsorFair $sponsorFair */
        $sponsorFair = $this->sponsorFairRepository->find($sponsorFairId);
        $urlImage = $this->getLink(Sponsor::FOLDER_SPONSOR, $sponsorFair->getSponsor()->getImage());
        return SponsorPresentation::formatDataSponsor($sponsorFair, $urlImage);
    }

    /**
     * @param $category
     * @param $fairId
     * @return array
     */
    public function listSponsorsByFair($category, $fairId)
    {
        /** @var Fair $fair */
        $fair = $this->findFairOrFail($fairId);

        $sponsorFairs = $this->sponsorFairRepository->listAllActiveSponsorsByFair($category, $fair);

        /** @var SponsorFair $sponsorFair */
        foreach ($sponsorFairs as $sponsorFair) {

            $urlImage = $this->getLink(Sponsor::FOLDER_SPONSOR, $sponsorFair->getSponsor()->getImage());
            $sponsorFair->getSponsor()->setImage($urlImage);
        }

        return SponsorPresentation::formatDataListSponsors($sponsorFairs);
    }

    /**
     * @param $fairId
     * @return Fair
     */
    private function findFairOrFail($fairId)
    {
        $fair = $this->fairRepository->findById($fairId);

        if (empty($fair)) {
            throw new NotFoundHttpException('La feria solicitada no existe.');
        }

        return $fair;
    }

    /**
     * @param $type
     * @param $image
     * @return null|string
     */
    private function getLink($type, $image)
    {
        if (!empty($image)) {
            return $this->config['cde'] . $this->filterPath($this->folder[$type]) . $image;
        }

        return null;
    }

    /**
     * @param $folderS3
     * @return string
     */
    private function filterPath($folderS3)
    {
        return sprintf('%s/', str_replace('/', '', $folderS3));
    }
}