<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class ImageGalleryRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface ImageGalleryRepository
{
    /**
     * @param ImageGallery $imageGallery
     * @return mixed
     */
    public function persist(ImageGallery $imageGallery);

    /**
     * @param CompanyFair $companyFair
     * @return mixed
     */
    public function findImageGalleriesByCompanyFair($companyFair);

    /**
     * @param ImageGallery $imageGallery
     * @return mixed
     */
    public function remove(ImageGallery $imageGallery);

    /**
     * @param $companyFairId
     * @return mixed
     */
    public function getImageGalleryByCompanyFair($companyFairId);
}
